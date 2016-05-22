<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'teacher_id',
        'classroom_id',
        'tarikh'
    ];

    // Eloquent: Relationships
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }

    public function StudentAttendances(){
        return $this->hasMany('App\StudentAttendance');
    }
}
