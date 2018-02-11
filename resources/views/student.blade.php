@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $student->name }}</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
