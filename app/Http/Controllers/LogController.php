<?php

namespace App\Http\Controllers;

use App\Student;
use App\LogEntry;
use Carbon\Carbon;

class LogController extends Controller
{
    public function checkout($uuid, $type)
    {
        $student = Student::where('uuid', $uuid)->firstOrFail();

        // Maybe we should save their UUID to the session so we don't have to reference it in the view?

        // Before we check them out again, let's add something here to check if they already have a checkout of this type and offer to close it?

        $logEntry = LogEntry::create([
            'student_id' => $student->uuid,
            'time_out' => new Carbon(),
            'type' => ucfirst($type),
        ]);

        return view('checkout')->with(['message' => 'You are checked out.', 'uuid' => $uuid, 'logEntry' => $logEntry, 'checkoutType' => $type]);
    }

    public function checkin($uuid, $logEntryId)
    {
        $student = Student::where('uuid', $uuid)->firstOrFail();

        $logEntry = $student->logEntries->where('id', $logEntryId)->first();
        $logEntry->time_in = new Carbon();
        $logEntry->save();

        return view('checkin')->with(['message' => 'You are now checked in!']);
    }
}
