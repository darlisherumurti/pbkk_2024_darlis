<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Pinjaman;
use App\Models\User;
use Carbon\Carbon;
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
        foreach (range(1, 100) as $index) {
            $status_peminjaman = $faker->randomElement(['Menunggu Persetujuan', 'Disetujui', 'Ditolak']);
            $tanggal_peminjaman = Carbon::createFromFormat('Y-m-d', $faker->date($format = 'Y-m-d', $max = 'now'));
        
            $randomDays = $faker->numberBetween(1, 30);
            $tanggal_pengembalian = $tanggal_peminjaman->copy()->addDays($randomDays);
        
            $status_pengembalian = null;
            $tanggal_disetujui = null;
            $tanggal_dikembalikan = null;
        
            if ($status_peminjaman == 'Disetujui') {
                $status_pengembalian = $faker->randomElement(['Belum dikembalikan', 'Sudah dikembalikan']);
                $tanggal_disetujui = Carbon::createFromFormat('Y-m-d', $faker->date($format = 'Y-m-d', $max = 'now'));
        
                if ($status_pengembalian == 'Sudah dikembalikan') {
                    $tanggal_dikembalikan = Carbon::createFromFormat('Y-m-d', $faker->date($format = 'Y-m-d', $max = 'now'));
        
                    if ($tanggal_dikembalikan->lt($tanggal_pengembalian)) {
                        $tanggal_dikembalikan = $tanggal_pengembalian->copy()->addDays($faker->numberBetween(1, 30));
                    }
        
                    $tanggal_dikembalikan = $tanggal_dikembalikan->format('Y-m-d');
                }
            }
        
            Pinjaman::create([
                'buku_id' => Buku::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
                'status_persetujuan' => $status_peminjaman,
                'status_pengembalian' => $status_pengembalian,
                'alamat' => $faker->address,
                'nama_lengkap' => $faker->name,
                'durasi_peminjaman' => $faker->numberBetween(1, 30),
                'tanggal_peminjaman' => $tanggal_peminjaman->format('Y-m-d'),
                'tanggal_disetujui' => $tanggal_disetujui ?? null,
                'tanggal_pengembalian' => $tanggal_pengembalian->format('Y-m-d'),
                'tanggal_dikembalikan' => $tanggal_dikembalikan ?? null,
                'keterangan' => $faker->sentence($nbWords = 10, $variableNbWords = true),
            ]);
        }
    }
}
