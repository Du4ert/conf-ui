<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

// Главная страница конференции
Route::get('/', function () {
    return view('index');
})->name('homepage');


// Регистрация, аутентификация
Auth::routes(['verify' => true]);
// Для обычных пользователей

// Страница зарегистрированного пользователя
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Для админов
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
});

});