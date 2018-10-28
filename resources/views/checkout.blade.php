@extends('layouts.minimal')

@section('head')
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=mobile-web-app-capable content=yes>
	@if($checkoutType === 'Bathroom')
        <link rel="apple-touch-icon" href="{{ url('/img/bathroom-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('/img/bathroom-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/img/bathroom-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="167x167" href="{{ url('/img/bathroom-touch-icon.png') }}">
        <meta name="apple-mobile-web-app-title" content="Bathroom">
	@elseif($checkoutType === 'Library')
        <link rel="apple-touch-icon" href="{{ url('/img/library-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('/img/library-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/img/library-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="167x167" href="{{ url('/img/library-touch-icon.png') }}">
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
