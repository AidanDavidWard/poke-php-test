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
                        @foreach($item as $index => $area)
                            <span class="tag base-non-link">{{ $area['name'] }}</span>
                        @endforeach
                    @elseif($key == "Generation")
                        @foreach($item as $index => $generation)
                            <span class="tag base-non-link">{{ $generation['generation']['name'] }}</span>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop