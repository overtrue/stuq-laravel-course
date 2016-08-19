@extends('app')

@section('content')
<ul>
    <h1>foreach</h1>
    @foreach($users as $name)
        @if($loop->first)
        <li style="color: red"> {{ $name }}</li>
        @else
        <li>{{ $name }}</li>
        @endif
    @endforeach

    <br>

    <h1>for</h1>
    @for($i = 0; $i < count($users); $i++)
        <li> {{ $users[$i] }}</li>
    @endfor

    <h1>while</h1>
    @while($name = array_shift($users))
    <li> {{ $name }}</li>
    @endwhile
</ul>
@stop