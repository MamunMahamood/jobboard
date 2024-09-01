<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjobController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $total_user_jobs = Auth::user()->ajobs()->count(); // Fetch total records count
    $all_user_jobs = Auth::user()->ajobs()->get();     // Fetch all records

    return view('dashboard', [
        'total_user_jobs' => $total_user_jobs,
        'all_user_jobs' => $all_user_jobs,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::post('save', [AjobController::class, 'save'])->name('ajob-save')->middleware('auth');
Route::get('add-ajob', [AjobController::class, 'create'])->name('post-job')->middleware('auth');
Route::post('add-ajob', [AjobController::class, 'store']);
Route::get('/jobs/{id}', [AjobController::class, 'show'])->name('ajob-show');




Route::get('/home', [HomeController::class, 'home'])->name('home.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
