<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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



Route::get('/', [MainController::class, 'show']);
Route::get('/login', [MainController::class, 'login']);
Route::get('/register', [MainController::class, 'register']);

Route::get('/info/{id}', [MainController::class, 'info']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

/* Auth */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [MainController::class, 'dashboard']);
    Route::post('/claimItem/{id}', [MainController::class, 'claim']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.perform');
});

/* Admin */
Route::get('/admin/dashboard', [AdminController::class, 'show']);
