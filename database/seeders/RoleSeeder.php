<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'super-admin', 'label' => 'Super Admin'],
            ['name' => 'admin-donasi', 'label' => 'Admin Donasi'],
            ['name' => 'admin-psb', 'label' => 'Admin PSB'],
            ['name' => 'admin-media', 'label' => 'Admin Media'],
            ['name' => 'donatur', 'label' => 'Donatur'],
            ['name' => 'wali-santri', 'label' => 'Wali Santri'],
            ['name' => 'alumni', 'label' => 'Alumni'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}