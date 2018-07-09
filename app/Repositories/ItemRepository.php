<?php
namespace App\Repositories;

use App\Resources\Location;
use GuzzleHttp\Client;

class ItemRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getItemList($page = 0, $limit = 100) : array
    {
        $offset = $page * $limit;
        return json_decode($this->client->get("item?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    public function getItem(int $id) : array
    {
        return Location::make(
            json_decode($this->client->get("item/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}