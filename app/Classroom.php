<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
  protected $fillable = [
      'id',
      'admin_id',
      'kod_kelas',
      'nama_kelas'
  ];

  // Eloquent: Relationships
  public function admin(){
    return $this->belongsTo('App\Admin');
  }

  public function subjects(){
    return $this->belongsToMany('App\Subject','classroom_subjects','classroom_id','subject_id');
  }

  public function students(){
    return $this->hasMany('App\Student');
  }

  public function classroomsubjects(){
    return $this->hasMany('App\ClassroomSubject');
  }

  public function teachers4(){
    return $this->hasMany('App\Teacher','guru_kelas_id','id');
  }

}
