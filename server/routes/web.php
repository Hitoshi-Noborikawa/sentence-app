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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

// practice
Route::get('/practice/{user_id}/step-1', [App\Http\Controllers\PracticeController::class, 'step1'])->name('practice.step1');
Route::get('/practice/{user_id}/{sentence_id}/step-2', [App\Http\Controllers\PracticeController::class, 'step2'])->name('practice.step2');
Route::get('/practice/{user_id}/{sentence_id}/step-3', [App\Http\Controllers\PracticeController::class, 'step3'])->name('practice.step3');
Route::post('/practice/{user_id}/step-1', [App\Http\Controllers\PracticeController::class, 'createSentence'])->name('practice.create.sentence');
Route::post('/practice/{user_id}/{sentence_id}/step-2', [App\Http\Controllers\PracticeController::class, 'updateSentence'])->name('practice.update.sentence');
Route::post('/practice/{sentence_result_id}/score', [App\Http\Controllers\PracticeController::class, 'updateScore'])->name('practice.update.score');
// performance
Route::get('/performance', [App\Http\Controllers\PerformanceController::class, 'index'])->name('performance.index');
Route::get('/performance/{user_id}/{sentence_id}/detail', [App\Http\Controllers\PerformanceController::class, 'detail'])->name('performance.detail');

require __DIR__.'/auth.php';
