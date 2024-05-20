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

Route::get('/', function () {
    return view('index');
})->name('welcome');

Route::get('/contributor/register', function () {
    return view('register');
});


Auth::routes(['verify' => true]);

// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');  Для примера действия с аутентификацией

// Для админов
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    // Другие маршруты для администраторов
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});