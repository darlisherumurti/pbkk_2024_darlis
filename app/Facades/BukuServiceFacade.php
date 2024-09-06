<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class BukuServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'buku-service'; // This should match the binding name
    }
}
