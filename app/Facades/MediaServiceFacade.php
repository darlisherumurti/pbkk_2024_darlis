<?php

namespace App\Facades;

use App\Service\MediaService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string doSomething()
 */
class MediaServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MediaService::class; // This should match the binding name
        // return 'kategori-service'; // This should match the binding name
    }
}
