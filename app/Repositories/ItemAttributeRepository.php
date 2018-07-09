<?php
namespace App\Repositories;

use App\Resources\Location;
use GuzzleHttp\Client;

class ItemAttributeRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getItemAttributeList($page = 0, $limit = 100) : array
    {
        $offset = $page * $limit;
        return json_decode($this->client->get("item-attribute?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    public function getItemAttribute(int $id) : array
    {
        return Location::make(
            json_decode($this->client->get("item-attribute/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}