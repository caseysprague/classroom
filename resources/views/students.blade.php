@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Students</div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <td class="border-top-0"><b>Name</b></td>
                            <td class="border-top-0"><b></b></td>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->students as $student)
                            <tr>
                                <td class="pt-2 pb-2 align-middle">{{ $student->name }}</td>
                                <td class="pt-2 pb-2">
                                    <a class="btn btn-sm btn-primary float-right" href="{{ url('/student/'.$student->uuid) }}">View Logs</a>
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
