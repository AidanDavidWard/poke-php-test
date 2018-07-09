<?php
namespace App\Repositories;

use App\Resources\Location;
use App\Traits\RepositoryTrait;

class LocationRepository
{
    use RepositoryTrait;

    public function getLocationList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('location', $page,$limit);
    }

    public function getLocation(int $id) : array
    {
        return Location::make(
            $this->getSpecific('location', $id)
        )->resolve();
    }
}