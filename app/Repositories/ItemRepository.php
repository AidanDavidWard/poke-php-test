<?php
namespace App\Repositories;

use App\Resources\Location;
use App\Traits\RepositoryTrait;

class ItemRepository
{
    use RepositoryTrait;

    public function getItemList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('item', $page, $limit);
    }

    public function getItem(int $id) : array
    {
        return Item::make(
            $this->getSpecific('item', $id)
        )->resolve();
    }
}