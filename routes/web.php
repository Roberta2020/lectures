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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index']);
    Route::resource('grades', App\Http\Controllers\GradeController::class);
    Route::resource('student', App\Http\Controllers\StudentController::class);
    Route::resource('lecture', App\Http\Controllers\LectureController::class);
    Route::get('student/{id}/details', [App\Http\Controllers\StudentController::class, 'details'])->name('student.details');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
