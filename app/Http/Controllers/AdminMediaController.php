<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediaController extends Controller
{
    public function index(){
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function create()
    {
        return view('admin.media.create');
    }
    public function store(Request $request)
    {
        $file=$request->file('file');
        $name=time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
        return redirect('/admin/media');
    }
    public function destroy($id){
        $file=Photo::findOrFail($id);
        unlink(public_path().$file->file);
        $file->delete();
        return redirect('/admin/media');
    }
}
