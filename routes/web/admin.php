<?php

use App\Http\Controllers\Web\Admin\AlumniBiodataController;
use App\Http\Controllers\Web\Admin\Api\AlumniBiodataController as ApiAlumniBiodataController;
use App\Http\Controllers\Web\Admin\GraduationYearGroupController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Route;

// For API Routes
Route::get('alumni-biodata/api', ApiAlumniBiodataController::class)->name('alumni-biodata.api');

Route::resource('alumni-biodata', AlumniBiodataController::class);
Route::resource('graduation-year-group', GraduationYearGroupController::class);
Route::resource('users', UserController::class);
