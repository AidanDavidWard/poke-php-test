@extends('layout')

@section('content')
    <h2>Abilities List</h2>
    <table class="center">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>View more</th>
        </thead>
        <tbody>
        @foreach($abilitiesList as $ability)
            <tr>
                <td>{{ explode("/", $ability['url'])[6] }}</td>
                <td>{{ ucfirst($ability['name']) }}</td>
                <td><a href="{{ url("abilities/" . explode("/", $ability['url'])[6]) }}">Click</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop