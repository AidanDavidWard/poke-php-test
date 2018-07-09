<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('pageTitle')</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body>
        <div class="content">
            <div class="title m-l-md left">
                ADW Pokédex
            </div>
            <div class="links right m-t-la m-r-md">
                <a href="{{ url('pokemon') }}">Pokémon</a>
                <a href="{{ url('location') }}">Locations</a>
                <a href="{{ url('moves') }}">Moves</a>
                <a href="{{ url('items') }}">Items</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="content center main">
            @yield('content')
        </div>
    </body>
</html>
