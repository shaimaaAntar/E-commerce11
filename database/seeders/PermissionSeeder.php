<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',

            'view categories',
            'create categories',
            'edit categories',
            'delete categories',

            'view orders',
            'manage orders',

            'view users',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}