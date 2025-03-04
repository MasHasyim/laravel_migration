<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog'); // buat manggil controller
Route::get('/blog/add', [BlogController::class, 'add']); // ngehubungi blog-add blade
Route::post('/blog/create', [BlogController::class, 'create']); //add&create blog


Route::get('/blog/{id}/detail', [BlogController::class, 'show']);
Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
Route::patch('/blog/{id}/update', [BlogController::class, 'update']);
Route::get('/blog/{id}/delete', [BlogController::class, 'delete']);







// Route::get('/blog', function () {

//     // semisal ambil data dari database
//     $profile = 'aku programmer jago';
//     return view('blog', ['intro' => $profile]);
// })-> named('blog');

// Route::get('/blog/{id}', function ($id) {
//     return 'ini adalah blog '. $id;
// });


// Route::get('/blog/{id}', function (Request $request,$id){

//     return 'ini adalah blog '.$request->id;
// });

// // route::get('/blog/{id}', function (Request $request,$id){

// //     //anggap aja kita update data
// //     return redirect()->route('blog');
// // });
