<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    protected $fillable = [
      'admin_id',
      'classroom_id',
      'subject_id',
      'teacher_id',
      'sesi'
    ];

    // Eloquent: Relationships
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function admin2(){
        return $this->belongsTo('App\Admin');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }

    public function tasks2(){
        return $this->hasMany('App\Task');
    }
}
