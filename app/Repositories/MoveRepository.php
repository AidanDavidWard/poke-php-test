<?php
namespace App\Repositories;

use App\Resources\Move;
use App\Traits\RepositoryTrait;

class MoveRepository
{
    use RepositoryTrait;

    public function getMoveList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('move', $page, $limit);
    }

    public function getMove(int $id) : array
    {
        return Move::make(
            $this->getSpecific('move', $id)
        )->resolve();
    }
}