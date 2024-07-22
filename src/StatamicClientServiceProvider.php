<?php

namespace Marvinosswald\StatamicClient;

use Marvinosswald\StatamicClient\Commands\StatamicDiscoverCollections;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StatamicClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('statamic-client')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('passthrough')
            ->hasCommand(StatamicDiscoverCollections::class);
    }
}
