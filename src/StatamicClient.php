<?php

namespace Marvinosswald\StatamicClient;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Marvinosswald\StatamicClient\Exceptions\StatamicClientException;

class StatamicClient
{
    public static function getPassThroughContent(string $slug): string
    {
        try{
            $response = self::getPassThroughContentFromHost($slug);
        } catch (StatamicClientException $e) {
            if (
                !config("statamic-client.pass_through.fallback")
                || !Cache::has(StatamicClientConfig::cacheKey("fallback-{$slug}"))
            ) {
                abort(404);
            }
            Log::debug("[marvinosswald/statamic-client] using fallback content as source isn't available");
            $response = self::getFromPassThroughFallback($slug);
        }

        return $response;
    }

    private static function getPassThroughContentFromHost(string $slug): string
    {
        $base = config('statamic-client.host_url');

        if ($base === null) {
            if (App::environment() === 'local') {
                throw new \RuntimeException("You don't have a statamic host url set, please set STATAMIC_HOST_URL");
            }
            Log::warning('No statamic host url set!');
            throw new StatamicClientException("You don't have a statamic host url set!");
        }

        $response = Http::get($base.'/'.$slug);
        if (! $response->ok()) {
            throw new StatamicClientException("Passthrough response wasn't ok: " . $response->toException()->getMessage());
        }

        if (config("statamic-client.pass_through.fallback")) {
            self::setFallback($slug, $response->body());
        }

        return $response->body();
    }

    private static function getFromPassThroughFallback(string $slug)
    {
        return Cache::get(StatamicClientConfig::cacheKey("fallback-{$slug}"));
    }

    private static function setFallback(string $slug, string $body)
    {
        return Cache::set(StatamicClientConfig::cacheKey("fallback-{$slug}"), $body);
    }
}
