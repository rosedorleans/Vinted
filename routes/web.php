<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/ad/create', [AdController::class, 'create'])->name('ad.create');
    Route::get('/dashboard/ad/{ad}', [AdController::class, 'show'])->name('ad.show');
    Route::post('/dashboard/ad', [AdController::class, 'post'])->name('ad.post');
    Route::get('/dashboard/ad/{ad}/edit', [AdController::class, 'edit'])->name('ad.edit');
    Route::patch('/dashboard/ad/{ad}', [AdController::class, 'update'])->name('ad.update');
    Route::delete('/dashboard/ad', [AdController::class, 'destroy'])->name('ad.destroy');
});

require __DIR__.'/auth.php';
