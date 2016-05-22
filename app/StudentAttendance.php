<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable = [
        'attendance_id',
        'student_id',
        'kedatangan',
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function attendance(){
        return $this->belongsTo('App\Attendance');
    }
}
