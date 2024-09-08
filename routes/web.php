<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjobController;
use App\Http\Controllers\ApplydetailController;
use App\Models\Applydetail;
use Illuminate\Support\Facades\Auth;

// Root route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    $total_user_jobs = Auth::user()->ajobs()->count(); // Fetch total records count
    $all_user_jobs = Auth::user()->ajobs()->get();     // Fetch all records
    $apply_detail = Applydetail::where('user_id', Auth::user()->id)->first();

    return view('dashboard', [
        'total_user_jobs' => $total_user_jobs,
        'all_user_jobs' => $all_user_jobs,
        'apply_detail' => $apply_detail,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Job-related routes
Route::post('save', [AjobController::class, 'save'])->name('ajob-save')->middleware('auth');
Route::post('apply', [AjobController::class, 'apply_job'])->name('apply-job')->middleware('auth');
Route::get('add-ajob', [AjobController::class, 'create'])->name('post-job')->middleware('auth');
Route::post('add-ajob', [AjobController::class, 'store']);
Route::get('/jobs/{id}', [AjobController::class, 'show'])->name('ajob-show');

Route::get('/dashboard/jobs', [AjobController::class, 'job_section'])->name('job-section');
Route::get('/dashboard/saved-jobs', [AjobController::class, 'saved_jobs'])->name('saved-jobs');
Route::get('/dashboard/applied-jobs', [AjobController::class, 'applied_jobs'])->name('applied-jobs');
Route::get('/dashboard/provided-jobs', [AjobController::class, 'provided_jobs'])->name('provided-jobs');
Route::get('/dashboard/provided-jobs/{id}', [AjobController::class, 'candidate_list'])->name('candidate-list');
Route::get('/dashboard/provided-jobs/candidates/{id}', [AjobController::class, 'candidate_profile'])->name('candidate-profile');
Route::get('/categories/new', [AjobController::class, 'create_cat'])->name('create-cat');
Route::post('store-cat', [AjobController::class, 'store_cat']);
Route::post('store-comment', [AjobController::class, 'store_comment'])->name('ajob-comment');
Route::post('store-reply', [AjobController::class, 'store_reply'])->name('ajob-reply');

// Home route
Route::get('/home', [HomeController::class, 'home'])->name('home.home');

// Apply detail routes
Route::get('/dashboard/edit', [ApplydetailController::class, 'detail'])->name('apply-detail');
Route::post('/apply-detail', [ApplydetailController::class, 'detail_store'])->name('apply-detail.store');

// Profile-related routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
