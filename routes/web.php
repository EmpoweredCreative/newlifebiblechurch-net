<?php

use App\Http\Controllers\Admin\SermonController as AdminSermonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SermonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/start-here', [PageController::class, 'startHere'])->name('start-here');
Route::get('/connect', [PageController::class, 'connect'])->name('connect');
Route::get('/who-we-are', [PageController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/ministries', [PageController::class, 'ministries'])->name('ministries');
Route::get('/ministries/kids', [PageController::class, 'kidsMinistry'])->name('ministries.kids');
Route::get('/ministries/youth', [PageController::class, 'youthMinistry'])->name('ministries.youth');
Route::get('/ministries/adults', [PageController::class, 'adultGroups'])->name('ministries.adults');

Route::get('/media', [SermonController::class, 'index'])->name('media');
Route::get('/media/{sermon:slug}', [SermonController::class, 'show'])->name('media.show');

Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:8,1')
    ->name('contact.store');

Route::get('/dashboard', function () {
    return inertia('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('sermons', AdminSermonController::class)->except(['show']);
    });

require __DIR__.'/auth.php';
