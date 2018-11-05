@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($students->count() === 0)
            <div class="card card-default mb-4">
                <div class="card-header">No Students</div>
                <div class="card-body">
                    Get started by adding a student from the <a href="{{ url('/students') }}">Students page</a>.
                </div>
            </div>
            @elseif($logEntries->count() === 0)
            <div class="card card-default mb-4">
                <div class="card-header">No Log Entries</div>
                <div class="card-body">
                    Your students have not generated any data. Check back later.
                </div>
            </div>
            @else
            <div class="card card-default">
                <div class="card-header">Number of Trips by Student</div>
                <div class="card-body">
                    <bar-chart :data="{{ json_encode($numberOfTripsByStudentChartData) }}" :options="{{ json_encode($options) }}" height="150px" />
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
