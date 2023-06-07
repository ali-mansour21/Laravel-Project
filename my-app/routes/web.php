<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Postcontroller: avoid the messy code by moving all the code to the postcontroller file
Route::get('/', [Postcontroller::class ,'index']);

// wildcard : posts/{post} : help us to make the response dynamic
Route::get('posts/{post:slug}',[Postcontroller::class,'show']);

Route::post('posts/{post:slug}/comments',[PostCommentController::class,'store']);

Route::post('newsletter', NewsletterController::class);

Route::post('logout',[SessionsControllers::class,'destroy'])->middleware('auth');

// Guest
Route::middleware('guest')->group(function (){
    Route::get('register',[RegisterController::class,'create']);
    Route::post('register',[RegisterController::class,'store']);
    Route::get('login',[SessionsControllers::class,'create']);
    Route::post('sessions',[SessionsControllers::class,'store']);
});

// Admin
Route::middleware('can:admin')->group(function(){
    // this collect all the actions with one route
    Route::resource('admin/posts',AdminPostController::class)->except('show');
    Route::delete('comments/{comment}',[PostCommentController::class,'destroy']);
    Route::get('admin/categories/create',[CategorieController::class,'create']);
    Route::post('admin/categories/create',[CategorieController::class,'store']);

    // resource help us get rid of the below and get a clean code

    // Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('can:admin');
    // Route::get('admin/posts/create',[AdminPostcontroller::class,'create'])->middleware('can:admin');
    // Route::post('admin/posts',[AdminPostcontroller::class,'store'])->middleware('can:admin');
    // Route::get('admin/posts/{post}/edit',[AdminPostcontroller::class,'edit'])->middleware('can:admin');
    // Route::patch('admin/posts/{post}',[AdminPostcontroller::class,'update'])->middleware('can:admin');
    // Route::delete('admin/posts/{post}',[AdminPostcontroller::class,'destroy'])->middleware('can:admin');
});
