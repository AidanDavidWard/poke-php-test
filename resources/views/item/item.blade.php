@extends('layout')

@section('content')
    <table>
        @foreach($item as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == 'Sprites')
                            @foreach($item as $name => $url)
                                @if($url !== null)
                                    <img src="{{ $url }}" alt="{{ $name }}">
                                @endif
                            @endforeach
                    @elseif($key == 'Effects')
                        @foreach($item as $index => $data)
                            <span class="tag base-non-link">{{ $data['short_effect'] }}</span>
                        @endforeach
                    @elseif($key == 'Attributes')
                        @foreach($item as $index => $attribute)
                            <a class="tag base" href="{{ url("item-attribute/" . explode("/", $attribute['url'])[6]) }}">{{ $attribute['name'] }}</a>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop