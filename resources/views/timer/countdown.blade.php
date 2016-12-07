@extends('layout')

@section('content')
    <div id="countdown">
        <countdown date="{{$time->target}}"></countdown>

        <small class="created pull-right">Created at {{$time->created_at}}</small>
    </div>
@endsection