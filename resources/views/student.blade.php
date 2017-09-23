@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $student->name }}</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <td><b>Trip Type</b></td>
                            <td><b>Time Out</b></td>
                            <td><b>Time In</b></td>
                        </thead>
                        <tbody>
                            @foreach($student->logEntries as $logEntry)
                            <tr>
                                <td>{{ $logEntry->type }}</td>
                                <td>{{ $logEntry->time_out }}</td>
                                <td>{{ $logEntry->time_in }}</td>
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
