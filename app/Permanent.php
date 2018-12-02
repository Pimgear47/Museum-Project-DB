<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permanent extends Model
{
    protected $table = 'permanent_collections';
    protected $fillable = ['art_obj_Id_no','Collections_Name','Date_acquired','Status','Cost'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->belongsTo(Art_obj::class,'art_obj_Id_no','Id_no');
    }

    public function Collection(){
        return $this->hasOne(Collection::class,'Collections_Name');
    }
}