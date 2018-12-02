<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $table = 'paintings';
    protected $fillable = ['art_obj_Id_no','Paint_type','Drawn_on','Style',];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->hasOne(Art_obj::class,'Id_no');
    }
}


			
