<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        return view('students');
    }

    public function show($uuid)
    {
        $student = \Auth::user()->students()->where('uuid', $uuid)->with('logEntries')->firstOrFail();
        return view('student')->with('student', $student);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|string'
        ]);

        $student = new Student;
        $student->name = request('name');
        $student->uuid = Str::uuid();
        $student->teacher()->associate(request()->user());
        $student->save();

        return back()->with('status', $student->name.' has been created!');
    }
}
