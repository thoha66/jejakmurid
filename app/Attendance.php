<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'teacher_id',
        'student_id',
        'kedatangan',
        'tarikh'
    ];

    // Eloquent: Relationships
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }
}
