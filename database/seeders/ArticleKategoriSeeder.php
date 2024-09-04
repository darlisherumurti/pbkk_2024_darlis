<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class ArticleKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Kategori::create([
                'nama' => $faker->unique()->word,
                'deskripsi' => $faker->sentence
            ]);
        }

        $kategoriIds = Kategori::pluck('id')->toArray();

        $authorRole = Role::where('name', 'writer')->first();
        if (!$authorRole) {
            return; 
        }

        $userIds = User::role('writer')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            $article = Article::create([
                'judul' => $faker->sentence,
                'konten' => $faker->randomHtml(), 
                'user_id' => $faker->randomElement($userIds),
                'published_at' => $faker->boolean ? $faker->dateTime : null,
            ]);

            // Attach 1 to 5 random categories to the article
            $randomCategories = $faker->randomElements($kategoriIds, $faker->numberBetween(1, 5));
            $article->kategoris()->attach($randomCategories);
        }
    }
}
