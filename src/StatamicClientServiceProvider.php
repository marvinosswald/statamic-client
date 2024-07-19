<?php

namespace Marvinosswald\StatamicClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Marvinosswald\StatamicClient\Commands\StatamicClientCommand;

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
            ->hasMigration('create_statamic_client_table')
            ->hasCommand(StatamicClientCommand::class);
    }
}
