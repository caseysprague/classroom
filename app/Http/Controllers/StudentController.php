<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
    	return view('students');
    }

    public function show($uuid) {
    	$student = \Auth::user()->students()->where('uuid',$uuid)->with('logEntries')->firstOrFail();
    	return view('student')->with('student', $student);
    }
}
