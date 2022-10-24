<?php

use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\SexualOrientationController;
use App\Http\Controllers\Admin\SmokingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('/user', UserController::class)->middleware(['auth']);

    Route::resource('/gender', GenderController::class)->middleware(['auth']);

    Route::resource('/sexualOrientation', SexualOrientationController::class)->middleware(['auth']);

    Route::resource('/smoking', SmokingController::class)->middleware(['auth']);
});