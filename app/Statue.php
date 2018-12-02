<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statue extends Model
{
    protected $table = 'statues';
    protected $fillable = ['art_obj_Id_no','Height','Weight'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->hasOne(Art_obj::class,'Id_no');
    }
}
