<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'prosesLogin'])->name('proses.login');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile.index');
Route::post('/profile/update', [PageController::class, 'updateProfile'])->name('profile.update');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan.index');
Route::post('/pengelolaan', [PageController::class, 'storeSiswa'])->name('pengelolaan.store');
Route::get('/pengelolaan/{index}/edit', [PageController::class, 'editSiswa'])->name('pengelolaan.edit');
Route::put('/pengelolaan/{index}', [PageController::class, 'updateSiswa'])->name('pengelolaan.update');
Route::delete('/pengelolaan/{index}', [PageController::class, 'destroySiswa'])->name('pengelolaan.destroy');
