<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * @param string $route
     *
     * @dataProvider intendedRoutesProvider
     */
    public function testAllRoutes(string $route)
    {
        $this->get($route)->assertStatus(200);
    }

    public static function intendedRoutesProvider()
    {
        return [
            'Pokemon List'      => ['route' => '/pokemon'],
            'Pokemon Info'      => ['route' => '/pokemon/1'],
            'Ability List'      => ['route' => '/abilities'],
            'Ability Info'      => ['route' => '/abilities/1'],
            'Location List'     => ['route' => '/locations'],
            'Location Info'     => ['route' => '/locations/1'],
            'Region List'       => ['route' => '/regions'],
            'Region Info'       => ['route' => '/regions/1'],
            'Moves List'        => ['route' => '/moves'],
            'Moves Info'        => ['route' => '/moves/1'],
            'Categories List'   => ['route' => '/categories'],
            'Categories Info'   => ['route' => '/categories/1'],
            'Items List'        => ['route' => '/items'],
            'Items Info'        => ['route' => '/items/1'],
            'Attributes List'   => ['route' => '/attributes'],
            'Attributes Info'   => ['route' => '/attributes/1'],
        ];
    }
}
