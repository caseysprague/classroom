@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Number of Trips by Student</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <bar-chart :data="{{ json_encode($numberOfTripsByStudentChartData) }}" :options="{{ json_encode($options) }}" height="150px" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
