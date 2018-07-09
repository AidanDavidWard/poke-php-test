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
Route::get('regions', 'LocationController@regionsIndex');
Route::get('regions/{id}', 'LocationController@regions');

// Move routes
Route::get('moves', 'MoveController@index');
Route::get('moves/{id}', 'MoveController@moves');
Route::get('categories', 'MoveController@categoriesIndex');
Route::get('categories/{id}', 'MoveController@categories');

// Item routes
Route::get('items', 'ItemController@index');
Route::get('items/{id}', 'ItemController@items');
Route::get('attributes', 'ItemController@attributesIndex');
Route::get('attributes/{id}', 'ItemController@attributes');