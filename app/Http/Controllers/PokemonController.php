<?php
namespace App\Http\Controllers;

use App\Repositories\AbilitiesRepository;
use App\Repositories\PokemonRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Application as Application;

class PokemonController extends BaseController
{
    /** @var Client  $client */
    private $client;
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
        $this->pokemonRepository = new PokemonRepository($this->client);
        $this->abilitiesRepository = new AbilitiesRepository($this->client);
        $this->request = $request;
    }

    public function index() {
        $this->processPageAndLimitParams();
        $pokemonListResults = $this->pokemonRepository->getPokemonList($this->page - 1, $this->limit);
        $viewParams = [
            'pokemonList' => $pokemonListResults['results'],
            'totalNumber' => $pokemonListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('pokemon.index')
            ->with($viewParams);
    }

    public function pokemon(int $id) {
        return view('pokemon.pokemon')
            ->with(
                'pokemon',
                $this->pokemonRepository->getPokemon( $id)
            );
    }

    public function abilitiesIndex() {
        $this->processPageAndLimitParams();
        $abilitiesListResults = $this->abilitiesRepository->getAbilityList($this->page - 1, $this->limit);
        $viewParams = [
            'abilitiesList' => $abilitiesListResults['results'],
            'totalNumber' => $abilitiesListResults['count'],
            'page' => $this->page,
            'limit' => $this->limit
        ];

        return view('pokemon.abilitiesIndex')
            ->with($viewParams);
    }

    public function abilities(int $id) {
        return view('pokemon.abilities')
            ->with(
                'ability',
                $this->abilitiesRepository->getAbility($id)
            );
    }

    private function processPageAndLimitParams() {
        $this->limit = (int) $this->request->input('limit',100);
        $this->page = (int) $this->request->input('page', 1); //for display purposes. Wouldn't want them seeing page 2 as page 1
    }
}
