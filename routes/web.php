<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'PokemonController@index');

// Pokemon routes
Route::get('pokemon', 'PokemonController@index');
Route::get('pokemon/{id}', 'PokemonController@pokemon');
Route::get('abilities', 'PokemonController@abilitiesIndex');
Route::get('abilities/{id}', 'PokemonController@abilities');

// Location routes
Route::get('location', 'LocationController@index');
Route::get('location/{id}', 'LocationController@location');
Route::get('region', 'LocationController@regionIndex');
Route::get('region/{id}', 'LocationController@region');

// Move routes
Route::get('moves', 'MoveController@index');
Route::get('moves/{id}', 'MoveController@moves');
Route::get('categories', 'MoveController@categoriesIndex');
Route::get('categories/{id}', 'MoveController@categories');

// Item routes
Route::get('item', 'ItemController@index');
Route::get('item/{id}', 'ItemController@item');
Route::get('item-attribute', 'ItemController@itemAttributeIndex');
Route::get('item-attribute/{id}', 'ItemController@itemAttribute');