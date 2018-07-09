@extends('layout')

@section('content')
    <h2>Pokemon List</h2>
    <table class="center">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>View more</th>
        </thead>
        <tbody>
            @foreach($pokemonList as $pokemon)
                <tr>
                    <td>{{ explode("/", $pokemon['url'])[6] }}</td>
                    <td>{{ ucfirst($pokemon['name']) }}</td>
                    <td><a href="{{ url("pokemon/" . explode("/", $pokemon['url'])[6]) }}">Click</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop