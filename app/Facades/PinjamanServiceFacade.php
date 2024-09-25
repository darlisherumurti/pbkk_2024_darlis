<?php

namespace App\Facades;

use App\Service\PinjamanService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class PinjamanServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PinjamanService::class; // This should match the binding name
        // return 'pinjaman-service'; // This should match the binding name
    }
}
