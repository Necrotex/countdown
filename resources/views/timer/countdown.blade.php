@extends('layout')

@section('content')
    <div id="countdown">
        <countdown date="{{$time->target}}"></countdown>

        <small class="created pull-right">Created at {{$time->created_at}} | Target: {{$time->target}} | All times in UTC</small>
    </div>
@endsection