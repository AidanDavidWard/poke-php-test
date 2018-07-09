@extends('layout')

@section('content')
    <table>
        @foreach($region as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == "Locations")
                        @foreach($item as $name => $url)
                            @foreach($item as $index => $location)
                                <a class="tag base" href="{{ url("location/" . explode("/", $location['url'])[6]) }}">{{ ucfirst($location['name']) }}</a>
                            @endforeach
                        @endforeach
                    @elseif($key == "Pokedexes")
                        @foreach($item as $index => $pokedex)
                            <span class="tag base">{{ $pokedex['name'] }}</span>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop