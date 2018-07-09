<?php
namespace App\Repositories;

use App\Resources\Ability;
use App\Traits\RepositoryTrait;

class AbilitiesRepository
{
    use RepositoryTrait;

    public function getAbilityList($page = 0, $limit = 100) : array
    {
        return $this->getIndex('ability', $page, $limit);
    }

    public function getAbility(int $id) : array
    {
        return Ability::make(
            $this->getSpecific('ability', $id)
        )->resolve();
    }
}