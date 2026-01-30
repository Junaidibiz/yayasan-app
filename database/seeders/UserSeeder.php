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
        // 1. Buat User Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@multazam.com'],
            [
                'name' => 'Super Admin Multazam',
                'password' => Hash::make('password123'), // Gunakan password ini untuk login
            ]
        );

        // 2. Ambil data Role Super Admin dari database
        $roleAdmin = Role::where('name', 'super-admin')->first();

        // 3. Hubungkan User dengan Role tersebut
        if ($roleAdmin) {
            $admin->roles()->syncWithoutDetaching([$roleAdmin->id]);
        }
    }
}