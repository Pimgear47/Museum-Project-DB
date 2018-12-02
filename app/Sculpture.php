<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sculpture extends Model
{
    protected $table = 'sculptures';
    protected $fillable = ['art_obj_Id_no','Material','Height','Weight','Style'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->hasOne(Art_obj::class,'Id_no');
    }
}

