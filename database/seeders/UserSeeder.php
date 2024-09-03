<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $adminRole = Role::where('nama_role', 'Admin')->first();
        $authorRole = Role::where('nama_role', 'Author')->first();
        $userRole = Role::where('nama_role', 'User')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Author',
            'email' => 'author@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $authorRole->id,
        ]);


        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => $userRole->id,
        ]);

        foreach (range(1, 20) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('12345678'),
                'role_id' => $authorRole->id,
            ]);
        }

        foreach (range(1, 20) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('12345678'),
                'role_id' => $userRole->id,
            ]);
        }
    }
}
