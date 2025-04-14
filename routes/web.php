<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::resource('post', PostController::class);

// Route::get('test'   ,[PrimerControlador::class, 'index']    )->name('test');
// Route::get('test2'  ,[PrimerControlador::class, 'contact2'] )->name('test2');


//Route::resource('test', PrimerControlador::class)->names('test');
