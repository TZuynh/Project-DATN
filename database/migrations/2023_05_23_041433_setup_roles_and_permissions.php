<?php

use App\Acl\Acl;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (Acl::roles() as $role) {
            Role::findOrCreate($role);
        }

        foreach (Acl::permissions() as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        $superAdminRole = Role::findByName(Acl::ROLE_SUPER_ADMIN);
        $adminRole = Role::findByName(Acl::ROLE_ADMIN);
        $staffRole = Role::findByName(Acl::ROLE_STAFF);
        $customerRole = Role::findByName(Acl::ROLE_CUSTOMER);

        $superAdminRole->givePermissionTo(Acl::permissions());
        $adminRole->givePermissionTo(Acl::permissions([Acl::PERMISSION_PERMISSION_MANAGE]));
        $staffRole->givePermissionTo([
            Acl::PERMISSION_VIEW_MENU_STAFF,
            Acl::PERMISSION_USER_MANAGE,
            Acl::PERMISSION_CUSTOMER_MANAGE,
        ]);
        $customerRole->givePermissionTo([
            Acl::PERMISSION_VIEW_MENU_ACCOUNT,
        ]);
    }
};
