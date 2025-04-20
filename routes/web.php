<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(__DIR__ . '/web/auth.php');
Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(__DIR__ . '/web/dashboard.php');
Route::prefix('admin')->middleware('auth')->name('admin.')->group(__DIR__ . '/web/admin.php');
