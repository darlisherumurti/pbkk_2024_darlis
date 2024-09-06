<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BukuKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed Kategori Table
        $kategoris = [
            'Fiction', 
            'Non-Fiction', 
            'Science', 
            'History', 
            'Biography', 
            'Fantasy', 
            'Mystery', 
            'Romance', 
        ];
        
        $kategoriIds = [];

        foreach ($kategoris as $kategori) {
            $kategoriModel = Kategori::create([
                'nama' => $kategori,
            ]);
            $kategoriIds[] = $kategoriModel->id;
        }

        // Seed Buku Table and attach Kategori
        foreach (range(1, 100) as $index) {
            $judul = $faker->sentence(3);
            $buku = Buku::create([
                'judul' => $judul,
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'tahun_terbit' => $faker->year,
                'jumlah_halaman' => $faker->numberBetween(100, 500),
                'isbn' => $faker->isbn13,
                'image_url' => $faker->imageUrl(640, 480,'abstract', true, $judul),
                'deskripsi' => $faker->paragraph,
            ]);

            $randomKategoriIds = $faker->randomElements($kategoriIds, $faker->numberBetween(1, 5));
            $buku->kategoris()->attach($randomKategoriIds);
        }
    }
}
