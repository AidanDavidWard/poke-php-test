<?php
namespace App\Repositories;

use App\Resources\Pokemon;
use App\Traits\RepositoryTrait;

class PokemonRepository
{
    use RepositoryTrait;

    public function getPokemonList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('pokemon', $page, $limit);
    }

    public function getPokemon(int $id) : array
    {
        return Pokemon::make(
            $this->getSpecific('pokemon', $id)
        )->resolve();
    }
}