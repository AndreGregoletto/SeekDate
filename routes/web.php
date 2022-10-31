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

Route::controller(MatchController::class)->middleware(['auth'])->group(function(){
    Route::get('/match', 'index')->name('match');

    Route::post('/recuseMatch', 'recuseMatch')->name('recuseMatch');

    Route::post('/acceptMatch', 'acceptMatch')->name('acceptMatch');

    Route::get('dashboard', 'whoMatchMe')->name('dashboard');

    route::post('returnAccept', 'returnAccept')->name('returnAccept');

    route::post('returnRecuse', 'returnRecuse')->name('returnRecuse');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';