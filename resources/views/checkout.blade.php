@extends('layouts.minimal')

@section('head')
	@if($checkoutType == 'Bathroom')
		<link rel="apple-touch-icon" href="/img/bathroom-touch-icon.png">
        <meta name="apple-mobile-web-app-title" content="Bathroom">
	@elseif($checkoutType == 'Library')
		<link rel="apple-touch-icon" href="/img/library-touch-icon.png">
        <meta name="apple-mobile-web-app-title" content="Library">
	@endif
@endsection

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
