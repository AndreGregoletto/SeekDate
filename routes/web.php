<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/teste', function () {
    return view('profile');
})->middleware(['auth'])->name('teste');

Route::resource('profile', ProfileController::class)->middleware(['auth']);

Route::controller(MatchController::class)->group(function(){
    Route::get('/match', 'index')->name('match')->middleware(['auth']);
});

require __DIR__.'/auth.php';