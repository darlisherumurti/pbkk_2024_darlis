<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 100) as $index) {
            $status_peminjaman = $faker->randomElement(['Menunggu Persetujuan', 'Disetujui', 'Ditolak']);

            if($status_peminjaman == 'Disetujui') {
                $status_pengembalian = $faker->randomElement(['Belum dikembalikan', 'Sudah dikembalikan']);
            } else {
                $status_pengembalian = null;
            }
            
            Pinjaman::create([
                'buku_id' => Buku::inRandomOrder()->first()->id, // Use Buku model to get random ID
                'user_id' => User::inRandomOrder()->first()->id,
                'status_persetujuan' => $status_peminjaman,
                'status_pengembalian' => $status_pengembalian,
                'alamat' => $faker->address,
                'nama_lengkap' => $faker->name,
                'durasi_peminjaman' => $faker->numberBetween(1, 30),
                'tanggal_peminjaman' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_persetujuan' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_pengembalian' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_dikembalikan' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'keterangan' => $faker->sentence($nbWords = 10, $variableNbWords = true),
            ]);
        }
    }
}
