<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'teacher_id',
        'classroom_subject_id',
        'tajuk_tugasan',
        'penerangan_tugasan',
        'tarikh_beri',
        'tarikh_hantar',
        'status'
    ];

    // Eloquent: Relationships
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function taskmarks(){
        return $this->hasMany('App\TaskMark');
    }

    public function classroomsubject2(){
        return $this->belongsTo('App\ClassroomSubject');
    }
}
