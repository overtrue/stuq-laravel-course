@extends('app')

@section('content')
    User profile:
    ----
    <p>Username: {{ $user['name'] }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>是否为成人: @if($age >= 18) 成人 @else 未成年 @endif </p>
    <p>Phone: {{ $phone_number }}</p>
    <p>Description: {!! $description !!}</p>
@stop