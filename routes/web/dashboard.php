<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Web\Panel\HomeController::class)->name('index');
