<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ItemAttribute extends Resource
{
    public function toArray($request) : array
    {
        return [
            "ID" => $this->resource['id'],
            "Name" => ucfirst($this->resource['name']),
            "Region" => $this->resource['region'],
            "Areas" => $this->resource['areas'],
            "Generation" => $this->resource['game_indices'],
        ];
    }

}