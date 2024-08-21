<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjobController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::post('save', [AjobController::class, 'save'])->name('ajob-save');
Route::get('add-ajob', [AjobController::class, 'create'])->name('post-job');
Route::post('add-ajob', [AjobController::class, 'store']);
Route::get('/jobs/{id}', [AjobController::class, 'show'])->name('ajob-show');




Route::get('/home', [HomeController::class, 'home'])->name('home.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
