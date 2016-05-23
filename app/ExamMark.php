<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    protected $fillable = [
        'class_subject_exam_id',
        'student_id',
        'subject_id',
        'markah_peperiksaan'
    ];

    // Eloquent: Relationships
    public function ClassSubjectExam(){
        return $this->belongsTo('App\ClassSubjectExam');
    }
}
