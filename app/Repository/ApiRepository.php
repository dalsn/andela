<?php

namespace App\Repository;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Doctrine\Common\Cache\FilesystemCache;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;

class ApiRepository
{
    protected $url;
    protected $client;
    protected $cachePlugin;

    public function __construct($endpoint)
    {
        $this->url = $endpoint;
        $stack = HandlerStack::create();
        $stack->push(
            new CacheMiddleware(
                new PrivateCacheStrategy(
                    new DoctrineCacheStorage(
                        new FilesystemCache(storage_path('framework/cache/data'))
                    )
                )
            ), 
            'cache'
        );

        $this->client = new GuzzleClient([
            'handler' => $stack,
        ]);
    }

    public function getAll()
    {
        $response = $this->client->get($this->url);
        return json_decode($response->getBody(), true);
    }
}