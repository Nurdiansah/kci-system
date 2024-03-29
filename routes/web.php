<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/import', [App\Http\Controllers\TimbanganController::class, 'index'])->name('import');
Route::POST('/import', [App\Http\Controllers\TimbanganController::class, 'store'])->name('timbangan.store');

Route::get('/draf', [App\Http\Controllers\TimbanganController::class, 'draf'])->name('draf');
