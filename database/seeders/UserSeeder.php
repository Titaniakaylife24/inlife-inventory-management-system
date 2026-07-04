<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'role' => 'Admin',
                'name' => 'Administrator',
                'email' => 'admin@inlife.id',
                'password' => 'admin123',
            ],
            [
                'role' => 'Staff',
                'name' => 'Staff Inventory',
                'email' => 'staff@inlife.id',
                'password' => 'staff123',
            ],
            [
                'role' => 'Manager',
                'name' => 'Inventory Manager',
                'email' => 'manager@inlife.id',
                'password' => 'manager123',
            ],
            [
                'role' => 'Employee',
                'name' => 'Employee',
                'email' => 'employee@inlife.id',
                'password' => 'employee123',
            ],
        ];

        foreach ($users as $user) {

            $role = Role::where('name', $user['role'])->first();

            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'role_id' => $role->id,
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                ]
            );
        }
    }
}