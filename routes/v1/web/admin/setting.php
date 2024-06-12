<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('preference')->group(function () {
    Route::get('general-setting', [SettingController::class, 'generalSetting'])
        ->name('admin.preference.general_setting');
});
