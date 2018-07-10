@extends('layout')

@section('content')
    <table>
        @foreach($moveCategory as $key => $item)
            <tr>
                <th>{{ $key }}</th>
                <td>
                    @if($key == 'Moves')
                        @foreach($item as $index => $move)
                            <a class="tag base" href="{{ url("move/" . explode("/", $move['url'])[6]) }}">{{ $move['name'] }}</a>
                        @endforeach
                    @else
                        {{ $item }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop