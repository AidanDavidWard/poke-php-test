<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application as Application;

use App\Repositories\LocationRepository;
use App\Repositories\RegionRepository;

use App\Repositories\ItemRepository;
use App\Repositories\ItemAttributeRepository;

use App\Repositories\AbilitiesRepository;
use App\Repositories\PokemonRepository;

trait ControllerTrait
{
    /** @var Client  $client */
    private $client;

    /** @var LocationRepository $locationRespository */
    private $locationRespository;
    /** @var RegionRepository $regionRepository */
    private $regionRepository;

    /** @var ItemRepository $itemRespository */
    private $itemRespository;
    /** @var ItemAttributeRepository $itemAttributeRepository */
    private $itemAttributeRepository;

    /** @var PokemonRepository $pokemonRepository */
    private $pokemonRepository;
    /** @var AbilitiesRepository $abilitiesRepository */
    private $abilitiesRepository;

    /** @var Request $request */
    private $request;
    /** @var int $page The page number for pagination */
    private $page;
    /** @var int $limit The number of results to display on page */
    private $limit;

    public function __construct(Application $app, Request $request)
    {
        $this->client = $app->make('PokeAPI\Client');

        $this->locationRespository = new LocationRepository($this->client);
        $this->regionRepository = new RegionRepository($this->client);

        $this->itemRespository = new ItemRepository($this->client);
        $this->itemAttributeRepository = new ItemAttributeRepository($this->client);

        $this->pokemonRepository = new PokemonRepository($this->client);
        $this->abilitiesRepository = new AbilitiesRepository($this->client);

        $this->request = $request;
    }

    private function processPageAndLimitParams() {
        $this->limit = (int) $this->request->input('limit',100);
        $this->page = (int) $this->request->input('page', 1); //for display purposes. Wouldn't want them seeing page 2 as page 1
    }
}