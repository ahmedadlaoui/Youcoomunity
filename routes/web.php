<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard', function () {
    return view('dashboard/overview');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\EventController; 

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/', [EventController::class, 'getallevents'])->name('events.getallevents');




Route::middleware(['auth'])->group(function () {
    Route::post('/events', [EventController::class, 'addevent'])->name('events.addevent');
    Route::DELETE('/events', [EventController::class, 'removeevent'])->name('events.removeevent');
    Route::PUT('/events', [EventController::class, 'modifyeevent'])->name('events.modifyevent');
    Route::get('/overview', function () {
        return view('dashboard/overview');
    });
    // Route::get('/events', function () {
    //     return view('dashboard/myevents');
    // });
    Route::get('/settings', function () {
        return view('dashboard/settings');
    });
    Route::get('/participants', function () {
        return view('dashboard/participants');
    });
});
