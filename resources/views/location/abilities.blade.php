@extends('layout')

@section('content')
    <table>
        @foreach($ability as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == "Pokemon")
                        @foreach($item as $name => $url)
                            @foreach($item as $index => $pokemon)
                                <a class="tag base" href="{{ url("pokemon/" . explode("/", $pokemon['pokemon']['url'])[6]) }}">{{ ucfirst($pokemon['pokemon']['name']) }}</a>
                            @endforeach
                        @endforeach
                    @elseif($key == "Effect")
                        @foreach($item as $index => $effect)
                            <span class="tag base">{{ $effect['short_effect'] }}</span>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop