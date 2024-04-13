<?php

use App\Http\Controllers\Admin\AdminReptileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Mypage\AuthController;
use App\Http\Controllers\Mypage\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReptileController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;




//


// ここからユーザー画面 //
// トップページ
Route::get('/',[TopController::class, 'index'])->name('index');

// 人気の爬虫類
Route::get('/reptiles',[ReptileController::class, 'index'])->name('reptiles.index')->middleware('auth');
Route::get('/reptiles/{id}',[ReptileController::class, 'show'])->name('reptiles.show')->middleware('auth');

//マイページ
Route::get('/user/{id}',[UserController::class, 'show'])->name('mypage.users.index')->middleware('auth');
Route::get('/mypage/register',[UserController::class, 'create'])->name('mypage.users.create');
Route::post('/mypage',[UserController::class, 'store'])->name('mypage.users.store');
Route::get('/mypage/edit/{id}',[UserController::class, 'edit'])->name('mypage.users.edit');
Route::put('/mypage/update/{id}',[UserController::class, 'update'])->name('mypage.users.update');
Route::delete('/mypage/delete/{id}',[UserController::class, 'destroy'])->name('mypage.users.destroy');


// 投稿機能
// Route::get('/post/12345',[PostController::class, 'index'])->name('index')->middleware('auth');
Route::get('/post/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/post',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::delete('/post/delete/{id}',[PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


// 投稿一覧（おすすめ）
Route::get('/posts',[PostController::class, 'index'])->name('posts.index')->middleware('auth');


//いいね機能
Route::get('/post/like/{id}',[PostController::class, 'like'])->name('post.like')->middleware('auth');
Route::get('/post/unlike/{id}',[PostController::class, 'unlike'])->name('post.unlike')->middleware('auth');





// お問い合せフォーム
Route::get('/contact',[ContactController::class, 'index'])->name('contact')->middleware('auth');//入力
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm')->middleware('auth');//確認フォームページ
Route::post('/contact',[ContactController::class, 'sendMail'])->name('contact')->middleware('auth');// メール送信処理
Route::get('/contact/complete',[ContactController::class, 'complete'])->name('contact.complete')->middleware('auth');//送信完了ページ


// ここから管理画面
Route::get('/admin', function () {
    return view('admin.index');
});
// 爬虫類登録
Route::get('admin/reptiles',[AdminReptileController::class, 'index'])->name('admin.reptiles.index');
Route::get('admin/reptiles/create',[AdminReptileController::class, 'create'])->name('admin.reptiles.create');
Route::post('admin/reptiles',[AdminReptileController::class, 'store'])->name('admin.reptiles.store');
Route::get('admin/reptiles/{reptile}',[AdminReptileController::class, 'edit'])->name('admin.reptiles.edit');
Route::put('admin/reptiles/{reptile}',[AdminReptileController::class, 'update'])->name('admin.reptiles.update');
Route::delete('admin/reptiles/{reptile}',[AdminReptileController::class, 'destroy'])->name('admin.reptiles.destroy');

//一般ユーザ管理
Route::get('admin/user',[AdminUserController::class, 'index'])->name('admin.user.index');


//認証
Route::get('/mypage/login', [AuthController::class, 'showLoginForm'])->name('mypage.login');
Route::post('/mypage/login', [AuthController::class, 'login']);
Route::post('/mypage/logout', [AuthController::class, 'logout'])->name('mypage.logout');


// Route::get('/', function () {
//     return view('welcome');
// });