<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table ='wilayah_kecamatan';
    public function kabupaten()
    {
        return $this->belongsTo('App\kabupaten');
    }
    public function desa()
    {
        return $this->hasMany('App\desa');
    }
}
