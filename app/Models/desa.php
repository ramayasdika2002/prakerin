<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_desa','id_kecamatan'];
    public $timestamps = true;

    public function kecamatan() {
        return $this->belongsTo('App\Models\kecamatan','id_kota');
    }
    public function rw() {
        return $this->hasMany('App\Models\rw','id_desa');
    }
}
