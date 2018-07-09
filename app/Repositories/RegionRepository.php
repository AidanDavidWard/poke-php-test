<?php
namespace App\Repositories;

use App\Resources\Region;
use GuzzleHttp\Client;

class RegionRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getRegionList() : array
    {
        return json_decode($this->client->get("region")->getBody()->getContents(), true);
    }

    public function getRegion(int $id) : array
    {
        return Region::make(
            json_decode($this->client->get("region/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}