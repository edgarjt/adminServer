<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::prefix('server')->group(function () {
        Route::prefix('all')->group(function () {
            Route::get('servers', [ServerController::class, 'AllIndex'])->name('servers');
            Route::get('createFormServerAll', [ServerController::class, 'serverFormCreate'])->name('createFormServerAll');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreateAll');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdateAll');
            Route::get('serverDeleteAll/{id}', [ServerController::class, 'serverDelete']);
        });

        Route::prefix('high')->group(function () {
            Route::get('serversHigh', [ServerController::class, 'AllIndex'])->name('serversHigh');
            Route::get('createFormServerHigh', [ServerController::class, 'serverFormCreate'])->name('createFormServerHigh');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreateHigh');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdateHigh');
            Route::get('serverDeleteHigh/{id}', [ServerController::class, 'serverDelete']);
        });

        Route::prefix('medium')->group(function () {
            Route::get('serversMedium', [ServerController::class, 'AllIndex'])->name('serversMedium');
            Route::get('createFormServerMedium', [ServerController::class, 'serverFormCreate'])->name('createFormServerMedium');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreateMedium');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdateMedium');
            Route::get('serverDeleteMedium/{id}', [ServerController::class, 'serverDelete']);
        });

        Route::prefix('under')->group(function () {
            Route::get('serversUnder', [ServerController::class, 'AllIndex'])->name('serversUnder');
            Route::get('createFormServerUnder', [ServerController::class, 'serverFormCreate'])->name('createFormServerUnder');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreateUnder');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdateUnder');
            Route::get('serverDeleteUnder/{id}', [ServerController::class, 'serverDelete']);
        });

        Route::prefix('growth')->group(function () {
            Route::get('serversGrowth', [ServerController::class, 'AllIndex'])->name('serversGrowth');
            Route::get('createFormServerGrowth', [ServerController::class, 'serverFormCreate'])->name('createFormServerGrowth');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreateGrowth');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdateGrowth');
            Route::get('serverDeleteGrowth/{id}', [ServerController::class, 'serverDelete']);
        });
    });
});
