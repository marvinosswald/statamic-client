<?php

namespace Marvinosswald\StatamicClient\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Marvinosswald\StatamicClient\StatamicClient;

class PageController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function viewPassThrough(string $slug)
    {
        if (config('statamic-client.pass_through.cache.enabled')) {
            $body = Cache::remember("statamic-$slug", config('statamic-client.pass_through.cache.ttl'),
                fn () => StatamicClient::getPassThroughContent($slug)
            );
        } else {
            $body = StatamicClient::getPassThroughContent($slug);
        }

        return view(config('statamic-client.pass_through.view'), [
            'html' => $body,
        ]);
    }
}
