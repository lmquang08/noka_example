<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('error', function () {
    return view('404');
})->name('error');

Route::prefix('user')
    ->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user');
        Route::get('create', [UserController::class, 'create'])->middleware(['checkName', 'dataName'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::put('update', [UserController::class, 'update'])->name('update');
        Route::delete('delete', [UserController::class, 'delete'])->name('delete');
});
