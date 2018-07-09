<?php
namespace App\Repositories;

use App\Resources\ItemAttribute;
use App\Traits\RepositoryTrait;

class ItemAttributeRepository
{
    use RepositoryTrait;

    public function getItemAttributeList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('item-attribute', $page, $limit);
    }

    public function getItemAttribute(int $id) : array
    {
        return ItemAttribute::make(
            $this->getSpecific('item-attribute', $id)
        )->resolve();
    }
}