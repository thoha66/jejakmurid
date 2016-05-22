<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOffense extends Model
{
    protected $fillable = [
        'student_id',
        'offense_id',
        'tarikh',
        'masa',
        'tempat'
    ];


    // Eloquent: Relationships
    public function Offense(){
        return $this->belongsTo('App\Offense');
    }

    public function Student(){
        return $this->belongsTo('App\Student');
    }
}
