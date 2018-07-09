<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Region extends Resource
{
    public function toArray($request) : array
    {
        return [
            "ID" => $this->resource['id'],
            "Name" => ucfirst($this->resource['name']),
            "Locations" => $this->resource['locations'],
            "Main Generation" => ucfirst($this->resource['main_generation']['name']),
            "Pokedexes" => $this->resource['pokedexes'],
        ];
    }

}