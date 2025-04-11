<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::get('test'   ,[PrimerControlador::class, 'index']    )->name('test');
// Route::get('test2'  ,[PrimerControlador::class, 'contact2'] )->name('test2');


//Route::resource('test', PrimerControlador::class)->names('test');
