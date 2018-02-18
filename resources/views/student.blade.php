@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $student->name }}'s URLs for Check Out</div>

                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="form-group row">
                            <label for="bathroom-url-input" class="col-sm-2 col-form-label">Bathroom</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="bathroom-url-input" aria-label="Bathroom URL" value="{{ url('/checkout/'.$student->uuid.'/Bathroom') }}" readonly>
                                    <div class="input-group-append">
                                        <copy-button id="bathroom-url-copy-button" classes="btn btn-primary" contents-to-copy="{{ url('/checkout/'.$student->uuid.'/Bathroom') }}"></copy-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="library-url-input" class="col-sm-2 col-form-label">Library</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="library-url-input" aria-label="Library URL" value="{{ url('/checkout/'.$student->uuid.'/Library') }}" readonly>
                                    <div class="input-group-append">
                                        <copy-button id="library-url-copy-button" classes="btn btn-primary" contents-to-copy="{{ url('/checkout/'.$student->uuid.'/Library') }}"></copy-button>
                                    </div>
                                </div>
                            </div>
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
