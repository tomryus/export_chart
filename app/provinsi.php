<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $table ='wilayah_provinsi';

    public function kabupaten(){
        return $this->hasMany('App\kabupaten');
    }
    
}
