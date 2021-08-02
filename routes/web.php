<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'index'])
  ->name('blog-home');

Route::get('/blog/create', [BlogController::class, 'create'])
  ->middleware('auth')
  ->name('blog-create');

Route::post('/blog/create', [BlogController::class, 'store'])
  ->middleware('auth')
  ->name('blog-store');

Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])
  ->middleware('auth')
  ->name('blog-delete');

Route::get('/blog/view/{id}', [BlogController::class, 'show']);

Route::get('/dashboard', [BlogController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
