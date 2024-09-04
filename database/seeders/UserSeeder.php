<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $pengunjungRole = Role::where('name', 'pengunjung')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($petugasRole);

        User::create([
            'name' => 'Pengunjung',
            'email' => 'pengunjung@example.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($pengunjungRole);
    }
}
