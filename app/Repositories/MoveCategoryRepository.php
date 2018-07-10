<?php
namespace App\Repositories;

use App\Resources\MoveCategory;
use App\Traits\RepositoryTrait;

class MoveCategoryRepository
{
    use RepositoryTrait;

    public function getMoveCategoryList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('move-category');
    }

    public function getMoveCategory(int $id) : array
    {
        return MoveCategory::make(
            $this->getSpecific('move-category', $id)
        )->resolve();
    }
}