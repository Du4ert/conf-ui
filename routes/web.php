<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;

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
Route::get('/home/{id?}', [UserController::class, 'home'])->name('home');
Route::get('/edit', [UserController::class, 'editSelf'])->name('user.editSelf');
Route::put('/update', [UserController::class, 'updateSelf'])->name('user.updateSelf');


// Операции с файлами
Route::get('/{userId}/file/download', [FileController::class, 'download'])->name('file.download');
Route::post('/{userId}/file/store', [FileController::class, 'store'])->name('file.store');
Route::delete('/file/{id}/delete', [FileController::class, 'delete'])->name('file.delete');



// Для админов
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'list'])->name('user.list');
    Route::get('/user/{id}', [AdminController::class, 'getUser'])->name('user.get');
    Route::get('/user/{id}/edit', [AdminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [AdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
});

});