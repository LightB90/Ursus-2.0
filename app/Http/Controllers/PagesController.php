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

    public function pagina(Request $request)
    {
        if(substr($request->page,0,1) == 's') {
            $subpage_id = str_replace('s','',$request->page);
            $subpage = Subpage::with('elements','parent')->find($subpage_id);
            return view('components.subpagina',compact('subpage'));
        } else {
            $page = Page::with('childrens','parents','subpages')->find($request->page);
            if($page->childrens->count() > 0) {
                return view('components.pagina',compact('page'));
            } else {
                $subpage = Subpage::with('elements','parent')->where('page_id',$request->page)->first();
                return view('components.subpagina',compact('subpage'));
            }
        }
    }

    public function text_edit(Request $request)
    {
        Texts::find($request->id)->update(['data'=>$request->data]);
        return 'Textul a fost updatat cu succes!';
    }

    public function edit_file($id)
    {
        $image = Images::find($id);
        return view('modal.upload_file',compact('image'));
    }

    public function file_up(Request $request)
    {
        $storage = Storage::disk('public');
        $image = Images::find($request->id);
        $redirect_id = 's'.$image->parent->page_id;

        $storage->delete($image->path);

        $file = $request->file('filename');
        $name = $request->file('filename')->getClientOriginalName();

        Image::make($request->file('filename'))->resize(NULL, 378, function ($x) {
            $x->aspectratio();
        })->save('storage/'.$request->file('filename')->getClientOriginalName());
        $thumb_path = 'thumb/'.$name;

        if ($storage->exists($thumb_path)) $storage->delete($thumb_path);
        $storage->move($name,$thumb_path);

        $path = 'poze/'.$name;
        $storage->put($path, file_get_contents($file));

        $image->update([
            'name' => $name,
            'path' => $path,
            'thumb_path' => $thumb_path
        ]);

        return redirect()->route('home')->with( ['redirect_id' => $redirect_id] )->with('message','Poza a fost urcata cu succes!!');
    }

    public function image_full($id)
    {
        $image = Images::find($id);
        return view('modal.view_file',compact('image'));
    }
}
