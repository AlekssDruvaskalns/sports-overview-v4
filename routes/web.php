<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Controllers
Route::resource('events', EventController::class)->middleware(['auth']);
Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('organizations', OrganizationController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
