<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    function  __construct()
    {
        $this->middleware('auth');
    }

    public function createFolderView()
    {
        return view('CreateFolder');
    }

    public function createFolder(Request$request)
    {
        $validateData = $request->validate([
           'name' => 'required',
            'color' => 'required',
            'user_id' => ''
        ]);
        $folders = new Folder();
//        $folders = Folder::create($validateData);
        $folders->name = $request->input('name');
        $folders->color = $request->input('color');
        $folders->user_id = Auth::id();
        $folders->save();
    }

    public function updateFolder(Request $request , $id)
    {
        $folders = Folder::Find($id);
        $folders->name = $request->input('name');
        $folders->color = $request->input('color');
        $folders->save();
    }

    public function listFolder()
    {
        return view('listFolder');
    }

    public function listFoldervue()
    {
       return Folder::where('user_id',Auth::id())->get();
    }

    public function folderImage(Request $request,$id)
    {
        $folders = Folder::find($id);
        $request->session()->put('folder_id',$folders->id);
        session()->get('folder_id');
        return view('createImage');
    }

    public function deleteFolder($id)
    {
        for($i = 0 ; $i< Image::count() ; $i++ ){
            Image::where('folder_id',$id )->delete();
        }


        $image = Folder::find($id);
        $image->delete();
    }
}
