<?php

namespace App\Facades;

use App\Service\BukuService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class BukuServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        // return 'buku-service'; // This should match the binding name
        return BukuService::class; // This should match the binding name
    }
}
