<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MoveCategory extends Resource
{
    public function toArray($request) : array
    {
        return [
            'ID' => $this->resource['id'],
            'Name' => ucfirst($this->resource['name']),
            'Description' => $this->resource['descriptions'][0]['description'],
            'Moves' => $this->resource['moves'],
        ];
    }

}