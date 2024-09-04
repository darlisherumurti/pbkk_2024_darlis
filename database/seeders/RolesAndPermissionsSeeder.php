<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // buku
            'manage buku',
            'edit buku',
            'delete buku',
            'add buku',
            'view buku',
            // kategori
            'manage kategori',
            'create kategori',
            'edit kategori',
            'delete kategori',
            'view kategori',
            // peminjaman
            'manage peminjaman',
            'edit peminjaman',
            'delete peminjaman',
            'create peminjaman',
            'view peminjaman',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        $admin = Role::create(['name' => 'admin',]);
        $petugas = Role::create(['name' => 'petugas',]);
        $pengunjung = Role::create(['name' => 'pengunjung',]);
        
        $admin->givePermissionTo($permissions);
        $petugas->givePermissionTo([
            'manage peminjaman',
            'create peminjaman',
            'edit peminjaman',
            'view peminjaman',
            'view buku',
            'view kategori',
        ]);
        $pengunjung->givePermissionTo([
            'view buku',
            'view kategori',
            'view peminjaman',
        ]);
    }
}
