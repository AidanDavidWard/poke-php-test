@extends('layout')

@section('content')
    <h2>Region List</h2>
    <table class="center">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>View more</th>
        </thead>
        <tbody>
        @foreach($regionList as $region)
            <tr>
                <td>{{ explode("/", $region['url'])[6] }}</td>
                <td>{{ ucfirst($region['name']) }}</td>
                <td><a href="{{ url("region/" . explode("/", $region['url'])[6]) }}">Click</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop