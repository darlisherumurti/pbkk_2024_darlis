<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('buku')->insert([
                'judul' => $faker->sentence,
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'tahun_terbit' => $faker->year,
                'jumlah_halaman' => $faker->numberBetween(100, 500),
                'isbn' => $faker->isbn13,
                'kategori' => $faker->word,
                'deskripsi' => $faker->paragraph,
            ]);
        }
    }
}
