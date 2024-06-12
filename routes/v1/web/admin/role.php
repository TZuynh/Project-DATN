<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('authentication')->group(function () {
    Route::resource('role', RoleController::class, [
        'as' => 'admin.user.authentication'
    ]);
});
