@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Add Student</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/student') }}">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border border-danger' : null }}" placeholder="Student Name" aria-label="Student Name">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Add!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                    <a class="btn btn-sm btn-primary float-right" href="{{ url('/student/'.$student->uuid) }}">View</a>
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
