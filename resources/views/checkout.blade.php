@extends('layouts.minimal')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ $message }}
        </div>
        <div class="title m-b-md">
            <a href="/checkin/{{ $uuid }}/{{ $logEntry->id }}" class="btn btn-lg btn-primary">Check In!</a>
        </div>
    </div>
</div>
@endsection
