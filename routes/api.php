<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\Notes\SubjectController;
use App\Http\Controllers\Notes\ImageController;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



    Route::prefix('notes')->group(function (){
        Route::get('',[NoteController::class, 'index']);
        Route::get('{note:slug}',[NoteController::class, 'show'])->name('notes.show');
        Route::post('create',[NoteController::class, 'store']);
        Route::patch('{note:slug}/edit',[NoteController::class, 'update']);
        Route::delete('{note:slug}/delete',[NoteController::class, 'destroy']);
    });

    Route::prefix('subjects')->group(function (){

        Route::get('',[SubjectController::class, 'index']);

    });

    Route::prefix('images')->group(function (){
        Route::get('',[ImageController::class, 'index']);
        Route::post('upload',[ImageController::class, 'upload']);
    });








// Route::post('create',[NoteController::class, 'store']);
