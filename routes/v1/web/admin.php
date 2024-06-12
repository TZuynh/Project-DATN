<?php

use App\Acl\Acl;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    include 'admin/auth.php';

    Route::middleware(['auth.admin', 'role_or_permission:' . Acl::ROLE_SUPER_ADMIN . '|' . Acl::ROLE_ADMIN . '|' . Acl::ROLE_STAFF . '|' . Acl::PERMISSION_VIEW_MENU_ADMIN])->group(function () {
        include 'admin/dashboard.php';
        include 'admin/setting.php';
        include 'admin/role.php';
        include 'admin/user.php';
    });
});
