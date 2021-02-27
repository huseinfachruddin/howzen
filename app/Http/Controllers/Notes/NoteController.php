<?php

namespace App\Http\Controllers\Notes;

use App\Http\Resources\NoteResource;
use App\Models\{Subject,Note,Image};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class NoteController extends Controller
{
    public function index()
    {
        $notes= Note::with('subject')->latest()->get();

        return NoteResource::collection($notes);
    }

    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    public function store()
    {
    request()->validate([
    'subject'=>'required',
    'title'=>'required',
    'description'=>'required',
    'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $subject = Subject::findOrFail(request('subject'));
    $note = Note::create([
        'subject_id' => $subject->id,
        'title' => request('title'),
        'slug'=> \Str::slug(request('title')),
        'description'=>request('description'),
        ]);
        
    $image = Image::upload(request('image'),$note->id);

     return response()->json([
         'message'=>'your note was created',
         'note'=> [$note,$image],
     ]);
    }

    public function update(Note $note)
    {
        request()->validate([
            'subject'=>'required',
            'title'=>'required',
            'description'=>'required',
        
        ]);
        $subject = Subject::findOrFail(request('subjectId'));
        $note->update([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'description'=>request('description'),
         ]);
         return response()->json([
            'message'=>'your note was updated',
            'note'=> $note,
        ]);
    }

    public function destroy(Note $note)
    {

        $note->delete();

        return response()->json([
            'message'=>'your note was deleted',
        ],200);
    }
}
