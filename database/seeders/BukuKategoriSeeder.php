<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BukuKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed Kategori Table
        $kategoris = ['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography'];
        $kategoriIds = [];

        foreach ($kategoris as $kategori) {
            $kategoriModel = Kategori::create([
                'nama' => $kategori,
            ]);
            $kategoriIds[] = $kategoriModel->id;
        }

        // Seed Buku Table and attach Kategori
        foreach (range(1, 100) as $index) {
            $buku = Buku::create([
                'judul' => $faker->sentence,
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'tahun_terbit' => $faker->year,
                'jumlah_halaman' => $faker->numberBetween(100, 500),
                'isbn' => $faker->isbn13,
                'deskripsi' => $faker->paragraph,
            ]);

            // Assign 1 to 3 random categories to each book
            $randomKategoriIds = $faker->randomElements($kategoriIds, $faker->numberBetween(1, 3));
            $buku->kategoris()->attach($randomKategoriIds);
        }
    }
}
