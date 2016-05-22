<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offense extends Model
{
    protected $fillable = [
        'nama_kesalahan',
        'nota_kesalahan',
        'bilangan_mata_kesalahan'
    ];


    // Eloquent: Relationships
    public function StudentOffenses(){
        return $this->hasMany('App\StudentOffense');
    }
}
