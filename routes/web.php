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

Route::prefix('exam')->as('exam.')->group(function () {
    Route::get('/', [App\Http\Controllers\ExamController::class, 'index'])->name('index');
    Route::post('/create', [App\Http\Controllers\ExamController::class, 'store'])->name('create');
    Route::post('/filterL', [App\Http\Controllers\ExamController::class, 'filterL'])->name('logical');
    Route::post('/{id}', [App\Http\Controllers\ExamController::class, 'show'])->name('show');
    Route::post('/{id}', [App\Http\Controllers\ExamController::class, 'edit'])->name('edit');
    Route::post('/id', [App\Http\Controllers\ExamController::class, 'store'])->name('destroy');
});

