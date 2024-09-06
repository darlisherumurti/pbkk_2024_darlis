<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class KategoriServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'kategori-service'; // This should match the binding name
    }
}
