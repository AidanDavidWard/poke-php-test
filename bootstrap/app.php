<?php

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->bind('PokeAPI\Client', function (): GuzzleHttp\Client {
    return new GuzzleHttp\Client(
        [
            'base_uri' => 'http://pokeapi.co/api/v2/',
        ]
    );
});

$app->bind('Application', 'Illuminate\Foundation\Application');

return $app;
