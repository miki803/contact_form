<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function() {
    return redirect('/contact');
});


Route::get('/contact', [ContactController::class,'contact'])->name('contact');  //お問い合わせフォームの入力画面
Route::post('/confirm', [ContactController::class,'confirm'])->name('contact.confirm'); //お問い合わせフォームの確認画面
Route::post('/send', [ContactController::class, 'store'])->name('contact.send'); // 送信
Route::get('/thanks', [ContactController::class,'thanks'])->name('thanks'); //サンクスページ

Route::get('/register', [ContactController::class,'showForm'])->name('register.show'); //登録ページ
Route::post('/register', [ContactController::class,'register'])->name('register');

Route::get('/login', [ContactController::class,'login'])->name('login.show'); //ログインページ
Route::post('/login', [ContactController::class,'loginSubmit'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ContactController::class,'admin'])->name('admin'); //管理画面
});


