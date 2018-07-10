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
            <div class="links right m-t-la m-r-md m-b-md">
                <a href="{{ url('pokemon') }}">Pokémon</a>
                <a href="{{ url('abilities') }}">Abilities</a>
                <a href="{{ url('location') }}">Locations</a>
                <a href="{{ url('region') }}">Regions</a>
                <a href="{{ url('move') }}">Moves</a>
                <a href="{{ url('move-category') }}">Move Categories</a>
                <a href="{{ url('item') }}">Items</a>
                <a href="{{ url('item-attribute') }}">Item Attributes</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="content center main">
            @yield('content')
        </div>
    </body>
</html>
