<?php
namespace App\Repositories;

use App\Resources\Pokemon;
use GuzzleHttp\Client;

class PokemonRepository
{
    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPokemonList($page = 0, $limit = 100) : array
    {
        $offset = $page * $limit;
        return json_decode($this->client->get("pokemon?limit=$limit&offset=$offset")->getBody()->getContents(), true);
    }

    public function getPokemon(int $id) : array
    {
        return Pokemon::make(
            json_decode($this->client->get("pokemon/$id")->getBody()->getContents(), true)
        )->resolve();
    }
}