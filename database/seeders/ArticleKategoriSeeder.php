<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Kategori;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $kategori = [];

        foreach (range(1, 20) as $index) {
            $kategori[] = Kategori::create([
                'nama' => $faker->unique()->word,
                'deskripsi' => $faker->sentence
            ]);
        }

        $kategoriIds = Kategori::pluck('id')->toArray();
        // Fetch all author IDs
        $authorRoleId = Role::where('nama_role', 'Author')->first()->id;
        $userIds = User::where('role_id', $authorRoleId)->pluck('id')->toArray();

        // Create articles and attach 1 to 5 random categories to each
        foreach (range(1, 200) as $index) {
            $article = Article::create([
                'judul' => $faker->sentence,
                'konten' => $faker->randomHtml(50,3),
                'user_id' => $faker->randomElement($userIds),
                'published_at' => $faker->boolean ? $faker->dateTime : null,
            ]);

            // Attach 1 to 5 random categories to the article
            $randomCategories = $faker->randomElements($kategoriIds, $faker->numberBetween(1, 5));
            $article->kategoris()->attach($randomCategories);
        }
    }
}
