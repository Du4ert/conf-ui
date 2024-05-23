<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\AdminController;

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
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/edit', [UserController::class, 'editSelf'])->name('user.editSelf');
Route::put('/update', [UserController::class, 'updateSelf'])->name('user.updateSelf');


Route::get('/thesis/{id}/download', [ThesisController::class, 'download'])->name('thesis.download');
Route::get('image-upload', [ThesisController::class, 'index'])->name('thesis.get');
Route::post('/update/thesis', [ThesisController::class, 'store'])->name('thesis.store');
Route::delete('/thesis/{id}/delete', [ThesisController::class, 'delete'])->name('thesis.delete');





// Для админов
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'list'])->name('user.list');
    Route::get('/user/{id}', [AdminController::class, 'getUser'])->name('user.get');
    Route::get('/user/{id}/edit', [AdminController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [AdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    // Route::get('/', [AdminController::class, 'index']);
});

});