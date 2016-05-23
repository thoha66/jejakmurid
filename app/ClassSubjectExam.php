<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubjectExam extends Model
{
    protected $fillable = [
        'exam_id',
        'teacher_id',
        'classroom_subject_id',
        'sesi_peperiksaan'
    ];

    // Eloquent: Relationships
    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function ExamMarks(){
        return $this->hasMany('App\ExamMark');
    }
}
