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

Route::delete('/posts/images/{id}', [PostControllser::class, 'deleteImage'])->middleware(['auth']);


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/like/{post}',
    [LikeController::class, "store"])
    ->middleware('auth')->name('like.store');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
