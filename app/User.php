<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function students()
    {
        return $this->hasMany('App\Student', 'teacher_id')->orderBy('name');
    }

    public function logEntries()
    {
        return $this->hasManyThrough('App\LogEntry', 'App\Student', 'teacher_id', 'student_id');
    }
}
