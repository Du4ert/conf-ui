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
})->name('welcome');


// Регистрация, аутентификация
Auth::routes(['verify' => true]);
// Для обычных пользователей

// Страница зарегистрированного пользователя
Route::get('/home', [App\Http\Controllers\UserController::class, 'home'])->name('home');
Route::get('/edit', [App\Http\Controllers\UserController::class, 'editSelf'])->name('user.editSelf');
Route::put('/update', [App\Http\Controllers\UserController::class, 'updateSelf'])->name('user.updateSelf');


// Для админов
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'list'])->name('user.list');
    Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'getUser'])->name('user.get');
    Route::get('/user/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [App\Http\Controllers\AdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('user.destroy');
    // Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
});

});