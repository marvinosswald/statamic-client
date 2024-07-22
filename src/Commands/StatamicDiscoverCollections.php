<?php

namespace Marvinosswald\StatamicClient\Commands;

use Illuminate\Console\Command;

class StatamicDiscoverCollections extends Command
{
    public $signature = 'statamic-client:discover';

    public $description = 'Discover collections available on statamic host';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
