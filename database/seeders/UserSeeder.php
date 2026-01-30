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
        // Buat Akun Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@multazam.com'],
            [
                'name' => 'Super Admin Multazam',
                'password' => Hash::make('password123'),
            ]
        );

        // Tempelkan Role Super Admin
        $role = Role::where('name', 'super-admin')->first();
        if ($role) {
            $admin->roles()->syncWithoutDetaching([$role->id]);
        }
    }
}