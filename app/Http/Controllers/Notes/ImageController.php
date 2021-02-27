<?php

namespace App\Http\Controllers\Notes;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ImageController extends Controller
{
    public function index()
    {
        $image= Image::latest()->get();

        return response()->json([
            'message'=>'your image was uploaded',
            'message'=>$image,
            ],200);
    }
    public function upload()
    {
    request()->validate([
        'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'id_note' => 'required',
    ]);

    foreach (request('image') as $image) {
        $imgName = Uuid::uuid4().'.'.$image->extension();
        $image->move(public_path('images'), $imgName);

        $note[] = Image::create([
            'name' => $imgName,
            'id_note' => request('id_note'),
         ]);
    }
    return response()->json([
        'message'=>'your image was uploaded',
        'data'=>$note,
        ],200);

    }
}
