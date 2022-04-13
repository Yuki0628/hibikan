<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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
    return view('front');
});


Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('front');

//マイページ
Route::get('/home', [HomeController::class, 'index'])->name('home');

//個別投稿ページ
Route::get('/post/{id}', [PostController::class, 'show'])->name('post');


//ジャンル別ページ
Route::get('/category/{id}', [PostController::class, 'category'])->name('category');
Route::get('/source/{id}', [PostController::class, 'category'])->name('source');



//投稿作成
Route::get('/create', [PostController::class, 'create'])->name('create');
//投稿保存
Route::post('/store', [PostController::class, 'store'])->name('store');

//投稿編集
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
//更新
Route::post('/update', [PostController::class, 'update'])->name('update');
