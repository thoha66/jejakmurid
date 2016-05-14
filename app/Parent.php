<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
  protected $fillable = [
      'no_kp_penjaga',
      'nama_penjaga',
      'alamat_penjaga',
      'poskod_penjaga',
      'no_tel_penjaga',
      'email_penjaga',
      'no_kp_bapa',
      'nama_bapa',
      'alamat_bapa',
      'poskod_bapa',
      'no_tel_bapa',
      'email_bapa',
      'no_kp_ibu',
      'nama_ibu',
      'alamat_ibu',
      'poskod_ibu',
      'no_tel_ibu',
      'email_ibu'
  ];

  // Eloquent: Relationships
  public function user(){
    return $this->belongsTo('App\User');
  }
  
  public function admin(){
    return $this->belongsTo('App\Admin');
  }

  public function students(){
    return $this->hasMany('App\Student');
  }
}
