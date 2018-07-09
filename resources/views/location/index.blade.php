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
            @foreach($locationList as $location)
                <tr>
                    <td>{{ explode("/", $location['url'])[6] }}</td>
                    <td>{{ ucfirst($location['name']) }}</td>
                    <td><a href="{{ url("location/" . explode("/", $location['url'])[6]) }}">Click</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop