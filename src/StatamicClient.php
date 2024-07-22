<?php

namespace Marvinosswald\StatamicClient;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StatamicClient
{
    public static function getPassThroughContent(string $slug): string
    {
        $base = config('statamic-client.host_url');

        if ($base === null) {
            if (App::environment() === 'local') {
                throw new \RuntimeException("You don't have a statamic host url set, please set STATAMIC_HOST_URL");
            }
            Log::warning('No statamic host url set!');
            abort(404);
        }

        $response = Http::get($base.'/'.$slug);
        if (! $response->ok()) {
            abort(404);
        }

        return $response->body();
    }
}
