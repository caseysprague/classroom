<?php

namespace App\Http\Controllers;

use App\Student;
use App\LogEntry;

class LogController extends Controller
{
    public function checkout(Student $student, $type)
    {
        $student->logEntries()->whereNull('time_in')->each(function($entry) {
            $entry->time_in = now();
            $entry->save();
        });

        $logEntry = LogEntry::create([
            'student_id' => $student->uuid,
            'time_out' => now(),
            'type' => ucfirst($type),
        ]);

        return view('checkout')->with(['message' => 'You are checked out.', 'uuid' => $student->uuid, 'logEntry' => $logEntry, 'checkoutType' => $type]);
    }

    public function checkin(Student $student, LogEntry $logEntry)
    {
        abort_unless($student->logEntries->contains($logEntry), 403);

        $logEntry->time_in = now();
        $logEntry->save();

        return view('checkin')->with(['message' => 'You are now checked in!']);
    }
}
