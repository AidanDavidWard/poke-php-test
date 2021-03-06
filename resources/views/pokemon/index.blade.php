@extends('layout')

@section('content')
    <h2>Pokemon List</h2>
    <form action="{{ url("pokemon?page=$page") }}">
        <label for="limit-select">Limit:</label>
        <select name="limit" id="limit-select">
            @foreach(['100','250','500','750','1000'] as $limitValue)
                <option value="{{ $limitValue }}" {{ $limit == $limitValue ? 'selected' : '' }}>{{ $limitValue }}</option>
            @endforeach
        </select>
        <input type="submit" value="Go">
    </form>
    @for ($i = $limit; $i <= $totalNumber; $i += $limit)
        <a href="{{ url("pokemon?limit=$limit&page=" . ($i / $limit)) }}">{{ $i / $limit }}</a>
    @endfor
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