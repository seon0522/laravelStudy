<?php

use App\Http\Controllers\postsController;
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

Route::get('/', function () {
    return view('welcome');
});

//blade 컴포넌트는 나중에
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//미들웨어를 일일이 지정하는 것 보다 한번에 하는 게 더 좋을 것 같음
//Route::get('/posts/create', [postsController::class, 'create'])->middleware(['auth']);
//Route::post('/posts/store', [postsController::class, 'store'])->middleware(['auth']);
//Route::get('/posts/index', [postsController::class, 'index'])->name('posts.index');

//route함수로 부를 때 url이 바껴도 일관성 유지 가능.
// 여기서 그냥 name으로 주면 되기 때문 ..왜??
//라우터 이름으로 링크를 주기 때문에
Route::get('/posts/create', [postsController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [postsController::class, 'store'])->name('posts.store');
Route::get('/posts/index', [postsController::class, 'index'])->name('posts.index');

//나의 글 목록
Route::get('/posts/mylist', [postsController::class, 'mylist'])->name('posts.mylist');


Route::get('/posts/show/{id}', [postsController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}', [postsController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [postsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [postsController::class, 'destory'])->name('posts.delete');
