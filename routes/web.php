<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
Route::get('/', function () {
    return view('welcome');
})->name('home');



/*Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);*/

Route::group(['prefix' => 'gestion'], function () {
    //Route::resource('post', PostController::class);
    //Route::resource('category', CategoryController::class);

    Route::resources(
        [
            'post'=> PostController::class,
            'category' => CategoryController::class
        ]
    );
});

// Route::get('test'   ,[PrimerControlador::class, 'index']    )->name('test');
// Route::get('test2'  ,[PrimerControlador::class, 'contact2'] )->name('test2');


//Route::resource('test', PrimerControlador::class)->names('test');




    