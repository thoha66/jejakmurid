<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'kod_peperiksaan',
        'nama_peperiksaan'
    ];

    // Eloquent: Relationships
    public function ClassSubjectExams(){
        return $this->hasMany('App\ClassSubjectExam');
    }
}
