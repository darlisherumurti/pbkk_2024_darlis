<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['nama_role' => 'Admin']);
        $authorRole = Role::create(['nama_role' => 'Author']);
        $userRole = Role::create(['nama_role' => 'User']);

        $permissions = [
            'create article',
            'edit article',
            'delete article',
            'view article',
            'manage article',
            'publish article',
            'unpublish article',
            'archive article',
            'restore article',
            'approve article',
            'create kategori',
            'edit kategori',
            'delete kategori',
            'view kategori',
            'manage kategori',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'manage users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'assign roles',
            'manage roles',
            'manage permissions'
        ];

        foreach ($permissions as $permissionName) {
            Permission::create(['nama_permission' => $permissionName]);
        }

        $adminPermissions = Permission::all();
        $authorPermissions = Permission::whereIn('nama_permission', [
            'create articles',
            'edit articles',
            'view articles',
            'publish articles',
            'unpublish articles'
        ])->get();
        $userPermissions = Permission::whereIn('nama_permission', [
            'view articles',
        ])->get();

        $adminRole->permissions()->attach($adminPermissions);
        $authorRole->permissions()->attach($authorPermissions);
        $userRole->permissions()->attach($userPermissions);
    }
}
