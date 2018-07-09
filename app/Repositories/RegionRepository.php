<?php
namespace App\Repositories;

use App\Resources\Region;
use App\Traits\RepositoryTrait;

class RegionRepository
{
    use RepositoryTrait;

    public function getRegionList() : array
    {
        return $this->getIndex('region');
    }

    public function getRegion(int $id) : array
    {
        return Region::make(
            $this->getSpecific('region', $id)
        )->resolve();
    }
}