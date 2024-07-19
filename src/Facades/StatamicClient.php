<?php

namespace Marvinosswald\StatamicClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marvinosswald\StatamicClient\StatamicClient
 */
class StatamicClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Marvinosswald\StatamicClient\StatamicClient::class;
    }
}
