<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMark extends Model
{
    protected $fillable = [

        'teacher_id',
        'task_id',
        'student_id',
        'mark'

    ];

    // Eloquent: Relationships
    public function task3(){
        return $this->belongsTo('App\Task');
    }
}
