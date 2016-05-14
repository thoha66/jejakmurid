<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'admin_id',
    'user_id',
    'no_kp_guru',
    'jenis_guru',
    'guru_kelas_id',
    'nama_guru',
    'no_tel_guru',
    'no_hp_guru',
    'tarikh_lahir_guru',
    'alamat_guru',
    'poskod_guru',
    'email_guru',
    'umur_guru',
    'jantina_guru'
  ];

  // Eloquent: Relationships
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function admin(){
    return $this->belongsTo('App\Admin');
  }

  public function classroom_subjects(){
    return $this->hasMany('App\ClassroomSubject');
  }

  public function tasks(){
    return $this->hasMany('App\Task');
  }

  public function attendances(){
    return $this->hasMany('App\Attendance');
  }

  public function classroom4(){
    return $this->belongsTo('App\Classroom','guru_kelas_id');
  }
}
