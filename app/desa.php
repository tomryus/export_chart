<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    protected $table ='wilayah_desa';

    public function kecamatan()
    {
        return $this->belongsTo('App\kecamatan');
    }
}
