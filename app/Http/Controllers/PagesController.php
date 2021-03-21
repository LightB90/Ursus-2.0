<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Subpage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function pagina(Request $request)
    {
        if(substr($request->page,0,1) == 's') {
            $pagina = substr($request->page,1,2);
            $page = Subpage::find($pagina);
            return view('templates.'.$page->template,compact('page'));
        } else {
            $page = Page::with('childrens','parents','subpages')->find($request->page);
            if($page->childrens->count() > 0) {
                return view('pagina',compact('page'));
            } else {
                $page = Subpage::where('page_id',$request->page)->first();
                return view('templates.'.$page->template,compact('page'));
            }
        }
    }

    public function navigation(Request $request)
    {
        $page = Page::with('childrens','parents','subpages')->find($request->page);
        return view('partials.navigation',compact('page'));
    }

    public function text_edit(Request $request)
    {
        $data = strval($request->data);
        Subpage::find($request->page)->update(['page_data'=>$data]);
        return 'Textul a fost updatat cu succes!';
    }

    public function edit_file($id)
    {
        return view('comps.modal_tt',compact('id'));
    }

    public function file_up(Request $request)
    {

        $file = $request->file('filename');
        $name = $request->file('filename')->getClientOriginalName();

        $storage = Storage::disk('public');
        $storage->put('/poze/'.$name, file_get_contents($file));

        return back();
    }
}
