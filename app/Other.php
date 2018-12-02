<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $table = 'others';
    protected $fillable = ['art_obj_Id_no','Type','Style'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->hasOne(Art_obj::class,'Id_no');
    }
}