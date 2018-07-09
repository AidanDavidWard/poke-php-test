<?php
namespace App\Repositories;

use App\Resources\Ability;
use GuzzleHttp\Client;

class AbilitiesRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAbilityList($page = 0, $limit = 100) : array
    {
        $offset = $page * $limit;
        return json_decode($this->client->get("ability?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    public function getAbility(int $id) : array
    {
        return Ability::make(
            json_decode($this->client->get("ability/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}