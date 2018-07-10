@extends('layout')

@section('content')
    <h2>Location List</h2>
    <form action="{{ url("location?page=$page") }}">
        <label for="limit-select">Limit:</label>
        <select name="limit" id="limit-select">
            @foreach(['100','250','500','750','1000'] as $limitValue)
                <option value="{{ $limitValue }}" {{ $limit == $limitValue ? 'selected' : '' }}>{{ $limitValue }}</option>
            @endforeach
        </select>
        <input type="submit" value="Go">
    </form>
    @for ($i = $limit; $i <= $totalNumber; $i += $limit)
        <a href="{{ url("location?limit=$limit&page=" . ($i / $limit)) }}">{{ $i / $limit }}</a>
    @endfor
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