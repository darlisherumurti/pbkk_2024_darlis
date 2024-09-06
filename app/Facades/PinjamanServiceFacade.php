<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class PinjamanServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pinjaman-service'; // This should match the binding name
    }
}
