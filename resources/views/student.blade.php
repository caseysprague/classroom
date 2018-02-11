@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $student->name }}'s Profile</div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div>
                            <div class="float-left">Bathroom URL:</div>
                            <a href="{{ url('/checkout/'.$student->uuid.'/bathroom') }}" class="float-right">{{ url('/checkout/'.$student->uuid.'/bathroom') }}</a>
                        </div>
                        <div>
                            <div class="float-left">Library URL:</div>
                            <a href="{{ url('/checkout/'.$student->uuid.'/library') }}" class="float-right">{{ url('/checkout/'.$student->uuid.'/library') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $student->name }}'s Log Entries</div>

                <div class="card-body">
                    @if($student->logEntries->count() > 0)
                    <table class="table table-sm">
                        <thead>
                            <td class="border-top-0"><b>Trip Type</b></td>
                            <td class="border-top-0"><b>Time Out</b></td>
                            <td class="border-top-0"><b>Time In</b></td>
                        </thead>
                        <tbody>
                            @foreach($student->logEntries as $logEntry)
                            <tr>
                                <td class="pt-2 pb-2 align-middle">{{ $logEntry->type }}</td>
                                <td class="pt-2 pb-2 align-middle">{{ $logEntry->time_out }}</td>
                                <td class="pt-2 pb-2 align-middle">{{ $logEntry->time_in }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    No log entries.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
