<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = [
      'admin_id',
      'tajuk',
      'tarikh_mula',
      'tarikh_akhir',
      'masa_mula',
      'masa_akhir',
      'tempat',
      'penerangan_aktiviti'
];


// Eloquent: Relationships
public function admin(){
  return $this->belongsTo('App\Admin');
}
}
