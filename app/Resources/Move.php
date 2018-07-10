<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Move extends Resource
{
    public function toArray($request) : array
    {
        return [
            'ID' => $this->resource['id'],
            'Name' => ucfirst($this->resource['name']),
            'Category' => $this->resource['meta']['category'],
            'Type' => $this->resource['type'],
            'PP' => $this->resource['pp'],
            'Accuracy' => $this->resource['accuracy'],
            'Power' => $this->resource['power'],
            'Targets' => $this->resource['target']['name'],
        ];
    }

}