<?php
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [LayoutController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('dashboard/index', [DashboardController::class, 'index']);
    Route::prefix('user')->group(function () {
        Route::get('index', [UserController::class, 'index']);
        Route::get('add', [UserController::class, 'formIndex']);
        Route::get('edit/{id}', [UserController::class, 'formIndex']);
        Route::post('handle', [UserController::class, 'handle']);
    });
});
