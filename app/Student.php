<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama','alamat','nilai'];
    public function courses()
    {
        return $this->belongsToMany('App\Course')->withPivot(['nilai']);

    }
     public function jumlah()
     {
         $jumlah = 0;
         $rata = 0;
         foreach($this->courses as $item){
             $rata += $item->pivot->nilai;
             $jumlah++;
         }
         return $rata/$jumlah;
     }
}
