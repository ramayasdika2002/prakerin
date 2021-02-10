<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kecamatan','id_kota'];
    public $timestamps = true;
    
    public function kota() {
        return $this->belongsTo('App\Models\kota','id_kota');
    }
    public function desa() {
        return $this->hasMany('App\Models\desa','id_kecamatan');
    }
}
