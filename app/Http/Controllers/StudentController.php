<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students');
    }

    public function show(Student $student)
    {
        abort_unless(request()->user()->students->contains($student), 403);

        return view('student')->with([
            'student' => $student,
            'logEntries' => $student->logEntries()->paginate(15),
            'links' => [
                'bathroom' => url('/checkout/'.$student->uuid.'/Bathroom'),
                'library' => url('/checkout/'.$student->uuid.'/Library'),
            ],
        ]);
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

    public function destroy(Request $request, Student $student)
    {
        abort_unless($request->user()->students->contains($student), 403, 'Not authorized.');

        $student->logEntries()->delete();
        $student->delete();

        return redirect('/students')->with('status', "{$student->name} has been deleted!");
    }
}
