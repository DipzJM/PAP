<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'perfil'])->name('perfil');
    Route::post('/update-image', [App\Http\Controllers\PerfilController::class, 'updateImage'])->name('updateImage');
    Route::post('/feedback', [App\Http\Controllers\IndexController::class, 'feedback'])->name('feedback');
});

Route::get('/2fa', function () {
    return view('auth.2fa');
})->name('2fa');

Route::get('/', [App\Http\Controllers\IndexController::class, 'indexPage'])->name('index');

Route::get('/send', [App\Http\Controllers\sendSmsController::class, 'send'])->name('sendSms');


Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');
