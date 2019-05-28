<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kabupaten extends Model
{
    protected $table ='wilayah_kabupaten';

    public function provinsi(){
        return $this->belongsTo('App\Provinsi');
    }
    public function kecamatan()
    {
        return $this->hasMany('App\kecamatan');
    }
}
