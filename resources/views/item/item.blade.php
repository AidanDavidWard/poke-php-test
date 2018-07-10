@extends('layout')

@section('content')
    <table>
        @foreach($item as $key => $dataPoint)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == 'Sprites')
                            @foreach($dataPoint as $name => $url)
                                @if($url !== null)
                                    <img src="{{ $url }}" alt="{{ $name }}">
                                @endif
                            @endforeach
                    @elseif($key == 'Effects')
                        @foreach($dataPoint as $index => $data)
                            <span class="tag base-non-link">{{ $data['short_effect'] }}</span>
                        @endforeach
                    @elseif($key == 'Attributes')
                        @foreach($dataPoint as $index => $attribute)
                            <a class="tag base" href="{{ url("item-attribute/" . explode("/", $attribute['url'])[6]) }}">{{ $attribute['name'] }}</a>
                        @endforeach
                    @else
                        {{ $dataPoint }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop