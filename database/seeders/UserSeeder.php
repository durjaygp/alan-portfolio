<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        $admin1 = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
            ]
        );
        $admin1->assignRole($superAdminRole);

        $admin2 = User::updateOrCreate(
            ['email' => 'admin@alan-humphreys.com'],
            [
                'name' => 'Alan Humphreys Admin',
                'password' => Hash::make('12345678'),
            ]
        );
        $admin2->assignRole($superAdminRole);
    }
}
