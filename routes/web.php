<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Auth::routes();

Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account');

Route::get('/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');

Route::post('/update', [\App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::post('/resetpassword', [\App\Http\Controllers\UserController::class, 'resetpassword'])->name('resetpassword');

Route::resource('/messages', \App\Http\Controllers\MessageController::class)->except('index');

Route::resource('/comments', \App\Http\Controllers\CommentController::class)->except('index' , 'create');

Route::get('/comments/create/{id}', [\App\Http\Controllers\CommentController::class , 'create']) ->name('comments.create');

Route::get('/search', [\App\Http\Controllers\MessageController::class, 'search'])->name('search'); 

Route::post('image-upload', [ \App\Http\Controllers\ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');



