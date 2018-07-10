<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Ability extends Resource
{
    public function toArray($request) : array
    {
        return [
            'ID' => $this->resource['id'],
            'Name' => ucfirst($this->resource['name']),
            'Generation' => ucfirst($this->resource['generation']['name']),
            'Pokemon' => $this->resource['pokemon'],
            'Effect' => $this->resource['effect_entries'],
        ];
    }

}