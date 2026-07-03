<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@inlife.id',
                'password' => 'admin123',
            ],
            [
                'role_id' => 2,
                'name' => 'Staff Inventory',
                'email' => 'staff@inlife.id',
                'password' => 'staff123',
            ],
            [
                'role_id' => 3,
                'name' => 'Inventory Manager',
                'email' => 'manager@inlife.id',
                'password' => 'manager123',
            ],
            [
                'role_id' => 8,
                'name' => 'Employee',
                'email' => 'employee@inlife.id',
                'password' => 'employee123',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'role_id' => $user['role_id'],
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                ]
            );
        }
    }
}