<?php
namespace App\Http\Controllers;

use App\Traits\ControllerTrait;
use Illuminate\Routing\Controller as BaseController;

class PokemonController extends BaseController
{
    use ControllerTrait;

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
