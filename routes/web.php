<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CoauthorController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\PosterController;

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
Route::get('/reports', [UserController::class, 'reports'])->name('reports');
Route::get('/files', [UserController::class, 'documents'])->name('documents');
Route::get('/edit', [UserController::class, 'editSelf'])->name('editSelf');
Route::put('/update', [UserController::class, 'updateSelf'])->name('updateSelf');


// Операции с Тезисами
Route::get('/thesis/create', [ThesisController::class, 'create'])->name('thesis.create');
Route::get('/thesis/{id}/edit', [ThesisController::class, 'edit'])->name('thesis.edit');
Route::post('/thesis/{id}/update', [ThesisController::class, 'update'])->name('thesis.update');
Route::post('/thesis/{id}/submit', [ThesisController::class, 'submit'])->name('thesis.submit');
Route::get('/thesis/{id}/show', [ThesisController::class, 'show'])->name('thesis.show');
Route::delete('/thesis/{id}/delete', [ThesisController::class, 'delete'])->name('thesis.delete');
Route::get('/thesis/{id}/download', [ThesisController::class, 'download'])->name('thesis.download');
Route::get('/thesis/{id}/downloadEn', [ThesisController::class, 'downloadEn'])->name('thesis.downloadEn');

// Операции с файлами
Route::get('/file/{userId}/download', [FileController::class, 'download'])->name('file.download');
Route::post('/{userId}/file/store', [FileController::class, 'store'])->name('file.store');
Route::post('/{thesisId}/poster/store', [FileController::class, 'storePoster'])->name('poster.store');
Route::post('/{thesisId}/expert/store', [FileController::class, 'storeExpert'])->name('expert.store');
Route::delete('/file/{id}/delete', [FileController::class, 'delete'])->name('file.delete');

// Операции с соавторами
// Route::get('/{userId}/file/download', [FileController::class, 'download'])->name('file.download');
Route::get('/coauthor/get/{id}', [CoauthorController::class, 'get'])->name('coauthor.get');
Route::get('/coauthor/{id}/show', [CoauthorController::class, 'show'])->name('coauthor.show');
Route::post('/coauthor/{id}/update', [CoauthorController::class, 'update'])->name('coauthor.update');
Route::post('/coauthor/store/{thesisId}', [CoauthorController::class, 'store'])->name('coauthor.store');
Route::delete('/coauthor/{id}/delete', [CoauthorController::class, 'delete'])->name('coauthor.delete');



// Для админов
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'list'])->name('user.list');
    Route::get('/user/{id}', [AdminController::class, 'getUser'])->name('user.get');
    Route::get('/user/{id}/reports', [AdminController::class, 'reports'])->name('user.get.reports');
    Route::get('/user/{id}/documents', [AdminController::class, 'documents'])->name('user.get.documents');
    // Route::get('/user/{id}/edit', [AdminController::class, 'edit'])->name('user.edit');
    // Route::put('/user/{id}/update', [AdminController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('/thesis/{id}/accept', [AdminController::class, 'thesisAccept'])->name('thesis.accept');
    Route::get('/thesis/{id}/decline', [AdminController::class, 'thesisDecline'])->name('thesis.decline');
    Route::get('/user/{id}/payAccept', [AdminController::class, 'paymentAccept'])->name('user.payAccept');
    Route::get('/user/{id}/payDecline', [AdminController::class, 'paymentDecline'])->name('user.payDecline');
    Route::get('/user/{id}/accept', [AdminController::class, 'participationAccept'])->name('user.accept');
    Route::get('/user/{id}/decline', [AdminController::class, 'participationDecline'])->name('user.decline');
    Route::post('/email', [AdminController::class, 'bulkNotification'])->name('bulk.email');
});

// Отдельные страницы
Route::get('/policy', function() {
    return view('pages.policy');
})->name('policy');

Route::get('/agreement', function() {
    return view('pages.agreement');
})->name('agreement');




});