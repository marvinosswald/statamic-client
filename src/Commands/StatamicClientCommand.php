<?php

namespace Marvinosswald\StatamicClient\Commands;

use Illuminate\Console\Command;

class StatamicClientCommand extends Command
{
    public $signature = 'statamic-client';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
