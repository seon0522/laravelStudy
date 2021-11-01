<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostControllser;
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

Route::resource('/posts', PostControllser::class)
->middleware(['auth']);

Route::resource('/comments',\App\Http\Controllers\CommentsController::class);

Route::delete('/posts/images/{id}', [PostControllser::class, 'deleteImage'])->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/like/{post_id}',
    [LikeController::class, "store"])
    ->middleware('auth')->name('like.store');

//여기는 정보를 받아서 오는거군아
Route::get('/comments/{post}', [\App\Http\Controllers\CommentsController::class,'index'])->name('comments.index');

//아 이거는 수정하라는 거구나
Route::patch('/comments/{comment_id}', [\App\Http\Controllers\CommentsController::class,'update'])->name('comments.update');

Route::post('/comments/{postId}', [\App\Http\Controllers\CommentsController::class, 'store'])->middleware('auth')
    ->name('comments.store');

Route::delete('/comments/{commentId}', [\App\Http\Controllers\CommentsController::class, 'destroy'])->name('comments.destroy');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
