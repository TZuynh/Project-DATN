<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('my-profile', [UserController::class, 'myProfile'])
    ->name('admin.user.my_profile');

Route::resource('user', UserController::class, ['as' => 'admin.user-management']);
