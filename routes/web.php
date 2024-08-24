<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/**
 * Redirect the root URL to the dashboard.
 *
 * @return RedirectResponse
 */
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/inbox', [TaskController::class, 'inbox'])->name('inbox');
Route::get('/today', [TaskController::class, 'today'])->name('today');
Route::get('/upcoming', [TaskController::class, 'upcoming'])->name('upcoming');
Route::get('/completed', [TaskController::class, 'upcoming'])->name('completed');
Route::get('/labels', function () {
    return 'labels';
})->name('labels');
/**
 * Display the dashboard view.
 *
 * This route requires authentication and email verification.
 *
 * @return View
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Group of routes that require authentication.
 */
Route::middleware('auth')->group(function () {
    /**
     * Display the profile edit form.
     *
     * @return View
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /**
     * Delete the user's profile.
     *
     * @return RedirectResponse
     */
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Include the authentication routes.
 */
require __DIR__.'/auth.php';

/**
 * Include the API routes.
 */
require __DIR__.'/api.php';
