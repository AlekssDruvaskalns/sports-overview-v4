<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\AthleteController;
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

//nested route
Route::resource('organizations.events', EventController::class);
Route::resource('organizations.posts', PostController::class);
Route::get('/sports/{sport}/organizations', [OrganizationController::class, 'index'])->name('sports.organizations.index');
Route::resource('sports.athletes', AthleteController::class);
Route::get('/sports/{sport}/athletes', [AthleteController::class, 'index'])->name('sports.athletes.index');

//Controllers
Route::resource('events', EventController::class)->middleware(['auth']);
Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('organizations', OrganizationController::class)->middleware(['auth']);
Route::resource('athlete', AthleteController::class);
Route::get('/', [SportController::class, 'index'])->name('sports.index');
Route::get('/sports/{sport}', [SportController::class, 'show'])->name('sports.show');
//Fallback to see all organizations
Route::get('/organizations', [OrganizationController::class, 'index'])->name('organizations.index');



require __DIR__.'/auth.php';
