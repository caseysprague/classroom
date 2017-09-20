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

    public function student() {
    	$this->hasOne('App\Student');
    }
}
