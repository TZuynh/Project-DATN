<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->name('index');

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
