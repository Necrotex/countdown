@extends('layout')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="select">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active" id="select-tab"><a href="#countdowntime" aria-controls="countdowntime" role="tab" data-toggle="tab">Countdown</a></li>
            <li role="presentation"><a href="#date" id="select-tab" aria-controls="date" role="tab" data-toggle="tab">Date</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="countdowntime">
                <form class="form-inline timepicker-form" method="post" action="{{route('timer.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group timepicker-group">
                        <label for="time-days">Days</label>
                        <input type="number" class="form-control timepicker" name="time-days" placeholder="0" step="1" min="0" required="required">
                    </div>

                    <div class="form-group timepicker-group">
                        <label for="time-hours">Hours</label>
                        <input type="number" class="form-control timepicker" name="time-hours" placeholder="0" min="0" step="1" max="23" required="required">
                    </div>

                    <div class="form-group timepicker-group">
                        <label for="time-minutes">Min</label>
                        <input type="number" class="form-control timepicker" name="time-minutes" placeholder="0" min="0" step="1" max="59" required="required">
                    </div>

                    <div class="form-group timepicker-group">
                        <label for="time-seconds">Sec</label>
                        <input type="number" class="form-control timepicker" name="time-seconds" placeholder="0" min="0" step="1" max="59" required="required">
                    </div>

                    <input class="btn btn-default btn-block submit" type="submit" value="Submit">
                </form>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="date">
                <form method="post" action="{{route('timer.store')}}" novalidate>
                    {{ csrf_field() }}

                    <input class="flatpickr" name="datetime" type="text" required="required">

                    <input class="btn btn-default btn-block submit" type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>
@endsection