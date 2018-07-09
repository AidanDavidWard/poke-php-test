<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Pokemon extends Resource
{
    public function toArray($request) : array
    {
        return [
            "ID" => $this->resource['id'],
            "Name" => ucfirst($this->resource['name']),
            "Sprites" => $this->resource['sprites'],
            "Height" => (string) ((float) $this->resource['height'] / 10) . ' m', //m - 0.7m comes through the endpoint as 7
            "Weight" => (string) ((float) $this->resource['weight'] / 10) . ' kg', //kg - 6.9kg comes through the endpoint as 69
            "Types" => $this->resource['types'],
            "Stats" => $this->resource['stats'],
            "Moves" => $this->resource['moves'],
            "Abilities" => $this->resource['abilities'],
        ];
    }

}