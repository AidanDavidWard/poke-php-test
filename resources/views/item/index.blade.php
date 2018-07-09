@extends('layout')

@section('content')
    <h2>Item List</h2>
    <table class="center">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>View more</th>
        </thead>
        <tbody>
            @foreach($itemList as $item)
                <tr>
                    <td>{{ explode("/", $item['url'])[6] }}</td>
                    <td>{{ ucfirst($item['name']) }}</td>
                    <td><a href="{{ url("item/" . explode("/", $item['url'])[6]) }}">Click</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop