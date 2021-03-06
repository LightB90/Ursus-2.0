<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Page;
use App\Models\Subpage;
use App\Models\Texts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function offline()
    {
        return view('offline');
    }

    public function pagina($id)
    {
        if (substr($id, 0, 1) == 's') {
            $subpage_id = str_replace('s', '', $id);
            $subpage = Subpage::with('elements', 'parent')->find($subpage_id);
            return view('components.subpagina', compact('subpage'));
        } else {
            $page = Page::with('childrens', 'parents', 'subpages')->find($id);
            if ($page->childrens->count() > 0) {
                return view('components.pagina', compact('page'));
            } else {
                $subpage = Subpage::with('elements', 'parent')->where('page_id', $id)->first();
                return view('components.subpagina', compact('subpage'));
            }
        }
    }

    public function text_edit(Request $request)
    {
        Texts::find($request->id)->update(['data' => $request->data]);
        return 'Textul a fost updatat cu succes!';
    }

    public function edit_file($id)
    {
        $image = Images::find($id);
        return view('modal.upload_file', compact('image'));
    }

    public function file_up(Request $request)
    {
        $storage = Storage::disk('public');
        $image = Images::find($request->id);
        $redirect_id = 's' . $image->parent->page_id;

        $storage->delete($image->path);

        $file = $request->file('filename');
        $name = time() . '-' . $request->file('filename')->getClientOriginalName();

        Image::make($request->file('filename'))->resize(NULL, 378, function ($x) {
            $x->aspectratio();
        })->save('storage/' . time() . '-' . $request->file('filename')->getClientOriginalName());
        $thumb_path = 'thumb/' . $name;

        if ($storage->exists($thumb_path)) $storage->delete($thumb_path);
        if ($storage->exists($name)) $storage->move($name, $thumb_path);

        $path = 'poze/' . $name;
        $storage->put($path, file_get_contents($file));

        $image->update([
            'name' => $name,
            'path' => $path,
            'thumb_path' => $thumb_path
        ]);

        return redirect()->route('home')->with(['redirect_id' => $redirect_id])->with('message', 'Poza a fost urcata cu succes!!');
    }

    public function image_full($id)
    {
        $image = Images::find($id);
        return view('modal.view_file', compact('image'));
    }

    public function generate_json()
    {
        $arr = [];
        array_push($arr,"/");
        array_push($arr,"/offline");
        array_push($arr,"https://code.jquery.com/jquery-3.2.1.slim.min.js");
        array_push($arr,"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        array_push($arr,"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
        array_push($arr,"/css/font/summernote.woff2");

        $pages = Page::pluck('id')->toArray();
        foreach ($pages as $page) {
            array_push($arr, "/pagina/".$page);
        }

        $subpages = Subpage::get()->groupBy('page_id')->toArray();
        foreach ($subpages as $val) {
            if (count($val) > 1) {
                foreach ($val as $subpage) {
                    array_push($arr, "/pagina/s".$subpage["id"]);
                }
            }
        }

        $images_path = public_path('/images');
        $images = array_diff(scandir($images_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
        foreach($images as $img) {
            array_push($arr, '/images/'.$img);
        }

        $images_path = public_path('/images/icons');
        $images = array_diff(scandir($images_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
        foreach($images as $img) {
            array_push($arr, '/images/icons/'.$img);
        }

        $images_path = public_path('/images/rame');
        $images = array_diff(scandir($images_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
        foreach($images as $img) {
            array_push($arr, '/images/rame/'.$img);
        }

        $css_path = public_path('/css');
        $css = array_diff(scandir($css_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
        foreach($css as $val) {
            array_push($arr, '/css/'.$val);
        }

        $fonts_path = public_path('/fonts');
        $fonts = array_diff(scandir($fonts_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
        foreach($fonts as $val) {
            array_push($arr, '/fonts/'.$val);
        }

//        $stored_images_path = public_path('/storage/poze');
//        $stored_images = array_diff(scandir($stored_images_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
//        foreach($stored_images as $val) {
//            array_push($arr, '/storage/poze/'.$val);
//        }
//
//        $stored_thumbs_path = public_path('/storage/thumb');
//        $stored_thumb = array_diff(scandir($stored_thumbs_path), array('.', '..', '.DS_Store', 'icons', 'rame','font'));
//        foreach($stored_thumb as $val) {
//            array_push($arr, '/storage/thumb/'.$val);
//        }

        $newJsonString = json_encode($arr, JSON_PRETTY_PRINT);
        file_put_contents(public_path('new_data.json'),stripslashes($newJsonString));
    }

}
