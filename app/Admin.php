<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected $fillable = [
    'user_id',
    'no_kp_admin',
    'nama_admin',
    'no_tel_admin',
    'no_hp_admin',
    'tarikh_lahir_admin',
    'alamat_admin',
    'poskod_admin',
    'email_admin',
    'jantina_admin'
  ];


  // Eloquent: Relationships
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function news(){
    return $this->hasMany('App\News');
  }

  public function teachers(){
    return $this->hasMany('App\Teacher');
  }

  public function students(){
    return $this->hasMany('App\Student');
//    return $this->hasMany(Student::class);
  }

  public function parents(){
    return $this->hasMany('App\Parent');
  }

  public function subjects(){
    return $this->hasMany('App\Subject');
  }

  public function classrooms(){
    return $this->hasMany('App\Classroom');
  }

  public function classroomsubjects(){
    return $this->hasMany('App\ClassroomSubject');
  }

  public function classroomsubjects2(){
    return $this->hasMany('App\ClassroomSubject');
  }

}
