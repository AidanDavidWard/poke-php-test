@extends('layout')

@section('content')
    <table>
        @foreach($itemAttribute as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == 'Descriptions')
                        @foreach($item as $index => $data)
                            <span class="tag base-non-link">{{ $data['description'] }}</span>
                        @endforeach
                    @elseif($key == 'Items')
                        @foreach($item as $index => $bagItem)
                            <a class="tag base" href="{{ url("item/" . explode("/", $bagItem['url'])[6]) }}">{{ $bagItem['name'] }}</a>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop