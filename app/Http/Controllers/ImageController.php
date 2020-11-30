<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    function  __construct()
    {
        $this->middleware('auth');
    }

    public function createImage(Request $request)
    {
        $images = new Image();

        $validateData = $request->validate([
            'path'=>'required',
        ]);

        // if ($request->path && $request->category) {
        //     $name = date('y-m-d') . time() . '.' . explode('/', explode(':',substr($request->path, 0, strpos($request->path, ';')))[1])[1];
        //     \Image::make($request->path)->save(public_path('/images/') . $name);
        //     $images->path = $name;
        // }

        $images->path = $request->input('path');
        $images->color = $request->input('color');
        $images->folder_id = session()->get('folder_id');
        $images->category = $request->input('category');
        $images->save();
    }

    public function createImagee(Request $request)
    {
        $images = new Image();

        $validateData = $request->validate([
            'path'=>'required',
        ]);

        if ($request->path) {
            $name = date('y-m-d') . time() . '.' . explode('/', explode(':',substr($request->path, 0, strpos($request->path, ';')))[1])[1];
            \Image::make($request->path)->save(public_path('/images/') . $name);
            $images->path = $name;
        }

        $images->folder_id = session()->get('folder_id');
        $images->category = $request->input('category');
        $images->color = 0;
        $images->save();
    }

    public function createImageView()
    {
        return view('createImage');
    }

    public  function listImage()
    {
        return Image::where('folder_id', session()->get('folder_id'))->get();
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();
    }
}
