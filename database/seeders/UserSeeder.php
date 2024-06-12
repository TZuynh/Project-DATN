<?php

namespace Database\Seeders;

use App\Acl\Acl;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 0) {
            return;
        }

        $superAdmin = User::withoutEvents(function () {
            return User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@shortened.com',
                'password' => Hash::make('SuperAdmin@shortened99'),
            ]);
        });

        $admin = User::withoutEvents(function () {
            return User::create([
                'name' => 'Admin',
                'email' => 'admin@shortened.com',
                'password' => Hash::make('Admin@shortened99'),
            ]);
        });

        $staff = User::withoutEvents(function () {
            return User::create([
                'name' => 'Staff',
                'email' => 'staff@shortened.com',
                'password' => Hash::make('Staff@shortened99'),
            ]);
        });

        $customer = User::withoutEvents(function () {
            return User::create([
                'name' => 'Customer',
                'email' => 'customer@shortened.com',
                'password' => Hash::make('Customer@shortened99'),
            ]);
        });

        $superAdminRole = Role::findByName(Acl::ROLE_SUPER_ADMIN);
        $adminRole = Role::findByName(Acl::ROLE_ADMIN);
        $staffRole = Role::findByName(Acl::ROLE_STAFF);
        $customerRole = Role::findByName(Acl::ROLE_CUSTOMER);

        //Sync Roles to seed accounts
        $superAdmin->syncRoles($superAdminRole);
        $admin->syncRoles($adminRole);
        $staff->syncRoles($staffRole);
        $customer->syncRoles($customerRole);
    }
}
