<?php

namespace App\Facades;

use App\Service\KategoriService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class KategoriServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return KategoriService::class; // This should match the binding name
    }
}
