<?php
namespace App\Repositories;

use App\Resources\Location;
use GuzzleHttp\Client;

class LocationRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLocationList($page = 0, $limit = 100) : array
    {
        $offset = $page * $limit;
        return json_decode($this->client->get("location?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    public function getLocation(int $id) : array
    {
        return Location::make(
            json_decode($this->client->get("location/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}