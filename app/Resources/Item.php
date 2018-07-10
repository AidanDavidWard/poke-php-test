<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Item extends Resource
{
    public function toArray($request) : array
    {
        return [
            'ID' => $this->resource['id'],
            'Name' => ucfirst($this->resource['name']),
            'Cost' => $this->resource['cost'],
            'Category' => ucfirst($this->resource['category']['name']),
            'Sprites' => $this->resource['sprites'],
            'Effects' => $this->resource['effect_entries'],
            'Attributes' => $this->resource['attributes']
        ];
    }

}