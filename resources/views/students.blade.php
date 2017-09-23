@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Students</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <td><b>Name</b></td>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary pull-right" href="{{ url('/student/'.$student->uuid) }}">View Logs</a>
                                </td>
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
