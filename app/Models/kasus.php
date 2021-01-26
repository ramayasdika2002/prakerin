<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus extends Model
{
    public function rw() {
        return $this->belongsTo('App\Models\rw\id_rw');
    }
}
