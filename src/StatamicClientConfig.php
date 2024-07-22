<?php

namespace Marvinosswald\StatamicClient;
class StatamicClientConfig {
    public static function cacheKey(string $slug = "")
    {
        $cache_prefix = config('statamic-client.pass_through.cache.prefix');
        return "$cache_prefix-$slug";
    }
}
