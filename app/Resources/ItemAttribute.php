<?php
namespace App\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ItemAttribute extends Resource
{
    public function toArray($request) : array
    {
        return [
            'ID' => $this->resource['id'],
            'Name' => ucfirst($this->resource['name']),
            'Descriptions' => $this->resource['descriptions'],
            'Items' => $this->resource['items'],
        ];
    }

}