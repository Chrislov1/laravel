<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', [indexController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [indexController::class, 'create'])->name('courses.create');
Route::post('/courses', [indexController::class, 'store'])->name('courses.store');
Route::put('/courses/terminer', [indexController::class, 'terminerCourse'])->name('courses.terminer');
Route::delete('/courses/supprimer', [indexController::class, 'supprimerCourse'])->name('courses.supprimer');


