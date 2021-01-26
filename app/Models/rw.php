<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    public function desa(){
        return $this->belongsTo('App\Models\desa\id_desa');
    }
    public function kasus(){
        return $this->hasMany('App\Models\rw\id_rw');
    }
}
