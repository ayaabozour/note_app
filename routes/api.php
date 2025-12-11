<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('/notes',\App\Http\Controllers\NoteController::class);
Route::apiResource('/sub-notes', \App\Http\Controllers\SubNoteController::class);
Route::apiResource('/users', \App\Http\Controllers\UsersController::class);
Route::apiResource('/comments',\App\Http\Controllers\CommentController::class);