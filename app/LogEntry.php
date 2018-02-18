<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
{
    protected $fillable = [
        'student_id', 'time_out', 'time_in', 'type'
    ];

    protected $dates = [
        'time_out', 'time_in',
    ];

    protected $appends =  [
        'duration_minutes'
    ];

    public function student()
    {
        $this->hasOne('App\Student');
    }

    public function getDurationMinutesAttribute()
    {
        return $this->time_out->diffInMinutes($this->time_in);
    }
}
