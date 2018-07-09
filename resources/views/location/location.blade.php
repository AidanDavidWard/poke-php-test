@extends('layout')

@section('content')
    <table>
        @foreach($location as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == "Region")
                        <a class="tag base" href="{{ url("regions/" . explode("/", $item['url'])[6]) }}">{{ ucfirst($item['name']) }}</a>
                    @elseif($key == "Areas")
                        @foreach($item as $index => $type)
                            <span class="tag {{ $type['type']['name'] }}">{{ $type['type']['name'] }}</span>
                        @endforeach
                    @elseif($key == "Stats")
                        @foreach($item as $index => $stat)
                            <span class="tag base-non-link">{{ $stat['stat']['name'] }}: {{ $stat['base_stat'] }}</span>
                        @endforeach
                    @elseif($key == "Moves")
                        @foreach($item as $index => $move)
                            <a class="tag base" href="{{ url("moves/" . explode("/", $move['move']['url'])[6]) }}">{{ $move['move']['name'] }}</a>
                        @endforeach
                    @elseif($key == "Abilities")
                        @foreach($item as $index => $ability)
                            <a class="tag base" href="{{ url("pokemon/abilities/" . explode("/", $ability['ability']['url'])[6]) }}">{{ $ability['ability']['name'] }}</a>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop