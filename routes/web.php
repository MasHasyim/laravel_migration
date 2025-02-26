<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {

    // semisal ambil data dari database
    $profile = 'aku programmer jago';
    return view('blog', ['intro' => $profile]);
})-> named('blog');

Route::get('/blog/{id}', function ($id) {
    return 'ini adalah blog '. $id;
});

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/{id}', function (Request $request,$id){

    return 'ini adalah blog '.$request->id;
});

// route::get('/blog/{id}', function (Request $request,$id){

//     //anggap aja kita update data
//     return redirect()->route('blog');
// });



