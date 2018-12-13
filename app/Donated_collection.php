<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donated_collection extends Model
{
    protected $table = 'donated_collections';
    protected $fillable = ['art_obj_Id_no','Date_donate','Donor','status_display'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->hasOne(Art_obj::class,'Id_no');
    }
}
