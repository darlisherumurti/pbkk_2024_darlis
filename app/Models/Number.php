<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    public static function getGenapGanjil($n)
    {
        $details = [];

        for ($i = 1; $i <= $n; $i++) {
            $details[] = [
                'number' => $i,
                'type' => $i % 2 === 0 ? 'Genap' : 'Ganjil',
            ];
        }

        return $details;
    }

    public static function getFibonaci($n)
    {
        $details = [];

        for ($i = 1; $i <= $n; $i++) {
            $details[] = [
                'number' => $i,
                'result' => fibonacciRekursif($i)
            ];
        }
        return $details;
    }    

    public static function getPrima($n)
    {
        $details = [];

        for ($i = 1; $i <= $n; $i++) {
            $details[] = [
                'number' => $i,
                'type' => isPrima($i)
            ];
        }
        return $details;
    }    

}

function fibonacciRekursif($n) {
    if ($n <= 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacciRekursif($n - 1) + fibonacciRekursif($n - 2);
    }
}

function isPrima($n) {
    // Cek jika $n kurang dari 2, maka bukan prima
    if ($n <= 1) {
        return 'Bukan Prima';
    }

    // Cek pembagi dari 2 sampai akar kuadrat dari $n
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return 'Bukan Prima'; // Jika ada yang membagi habis, maka bukan prima
        }
    }

    return 'Prima'; // Jika tidak ada yang membagi habis, maka prima
}
