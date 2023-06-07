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

Route::match(['get', 'post'], '/2fa', function (Illuminate\Http\Request $request) {
    $user = Auth::user();
    $phoneNumber = $user->userDetails->numero_telemovel;
    $vCode = $request->code;
    if ($user->userDetails->vCode == $vCode) {
        // Código correto, redirecionar para o perfil
        return redirect('/perfil');
    } else {
        // Código incorreto, retornar à mesma página com mensagem de erro
        return view('/2fa');
    }
})->name('2fa')->middleware('auth');





Route::get('/', [App\Http\Controllers\IndexController::class, 'indexPage'])->name('index');

Route::get('/send', [App\Http\Controllers\sendSmsController::class, 'send'])->name('sendSms');


Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

