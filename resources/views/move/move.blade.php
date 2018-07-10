@extends('layout')

@section('content')
    <table>
        @foreach($move as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == 'Category')
                        <a class="tag base" href="{{ url("move-category/" . explode("/", $item['url'])[6]) }}">{{ $item['name'] }}</a>
                    @elseif($key == 'Type')
                        <span class="tag {{ $item['name'] }}">{{ $item['name'] }}</span>
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop