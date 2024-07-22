<?php

namespace Marvinosswald\StatamicClient\Facades;

use Illuminate\Support\Facades\Facade;
use Marvinosswald\StatamicClient\Controllers\PageController;

/**
 * @see \Marvinosswald\StatamicClient\StatamicClient
 */
class StatamicClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Marvinosswald\StatamicClient\StatamicClient::class;
    }

    public static function passthrough(string $path): \Closure
    {
        $controller = new PageController();

        return fn () => $controller->viewPassThrough($path);
    }
}
