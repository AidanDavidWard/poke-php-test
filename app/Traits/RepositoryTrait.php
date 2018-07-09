<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait RepositoryTrait
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function getIndex(string $url, $page = 0, $limit = 100) {
        $offset = $page * $limit;
        return json_decode($this->client->get("$url?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    private function getSpecific(string $url, int $id) {
        return json_decode($this->client->get("$url/$id")->getBody()->getContents(), true);
    }
}