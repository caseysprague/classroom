<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'uuid', 'name'
    ];

    public function logEntries()
    {
        return $this->hasMany('App\LogEntry', 'student_id', 'uuid');
    }
}
