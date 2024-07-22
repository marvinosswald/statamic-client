<?php

use Illuminate\Support\Facades\Route;
use Marvinosswald\StatamicClient\Controllers\PageController;

$passThroughPrefix = config('statamic-client.pass_through.prefix');
Route::get("/$passThroughPrefix/{slug}", [PageController::class, 'viewPassThrough'])
    ->middleware(
        config('statamic-client.pass_through.middleware')
    );
