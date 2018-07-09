<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Location extends Resource
{
    public function toArray($request) : array
    {
        dd($this->resource);
        return [
            "ID" => $this->resource['id'],
            "Name" => ucfirst($this->resource['name']),
            "Region" => $this->resource['region'],
            "Areas" => $this->resource['areas'],
            "Generation" => $this->resource['game_indices'],
        ];
    }

}