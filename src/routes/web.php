<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ContactController::class, 'contact'])->name('contact');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/register', [ContactController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/login', [ContactController::class, 'login'])->name('login');
Route::get('/admin', [ContactController::class, 'admin'])->name('admin');

// 開発確認のルート
Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');
Route::get('/confirm-dev', function () {
    // 確認用の固定データ
    $data = [
        'first_name' => '太郎',
        'last_name' => '山田',
        'gender' => '男性',
        'email' => 'test@example.com',
        'phone1' => '080',
        'phone2' => '1234',
        'phone3' => '5678',
        'address' => '東京都渋谷区',
        'building' => '渋谷マンション101',
        'inquiry_type' => '製品に関する問い合わせ',
        'inquiry_content' => 'これはテストです。',
    ];
    return view('confirm', compact('data'));
})->name('confirm.dev');
