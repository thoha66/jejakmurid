<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOffense extends Model
{
    protected $fillable = [
        'teacher_id',
        'student_id',
        'offense_id',
        'tarikh_kesalahan',
        'masa_kesalahan',
        'tempat_kesalahan'
    ];


    // Eloquent: Relationships
    public function offense(){
        return $this->belongsTo('App\Offense');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
