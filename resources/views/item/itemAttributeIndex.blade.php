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
        @foreach($itemAttributeList as $itemAttribute)
            <tr>
                <td>{{ explode("/", $itemAttribute['url'])[6] }}</td>
                <td>{{ ucfirst($itemAttribute['name']) }}</td>
                <td><a href="{{ url("item-attribute/" . explode("/", $itemAttribute['url'])[6]) }}">Click</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop