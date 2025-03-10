<?php

use App\Models\phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/blog', [BlogController::class, 'index'])->name('blog'); // buat manggil controller
    Route::get('/blog/add', [BlogController::class, 'add']); // ngehubungi blog-add blade
    Route::post('/blog/create', [BlogController::class, 'create']); //add&create blog


    Route::get('/blog/{id}/detail', [BlogController::class, 'show'])->name('blog-detail');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::patch('/blog/{id}/update', [BlogController::class, 'update']);
    Route::get('/blog/{id}/delete', [BlogController::class, 'delete']);
    Route::get('/blog/{id}/restore', [BlogController::class, 'restore']);


    Route::get('user', [UserController::class, 'index']);

    Route::get('/phones', function () {
        $phones = Phone::with('user')->get();
        return $phones;
    });

    Route::get('/comment', [CommentController::class, 'index']);
    Route::post('/comment/{blog_id}', [CommentController::class, 'store']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});











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
