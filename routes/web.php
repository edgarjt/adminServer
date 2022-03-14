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
            Route::get('serverFormCreate', [ServerController::class, 'serverFormCreate'])->name('createFormServer');
            Route::post('serverCreate', [ServerController::class, 'serverCreate'])->name('serverCreate');
            Route::get('serverFormUpdate/{id}', [ServerController::class, 'serverFormUpdate'])->name('serverFormUpdate');
            Route::get('serverDelete/{id}', [ServerController::class, 'serverDelete']);
        });
    });
});


