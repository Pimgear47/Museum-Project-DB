<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{
    protected $table = 'borrowed_arts';
    protected $fillable = ['art_obj_Id_no','Collections_Name','Date_borrowed','Date_returned'];
    protected $primaryKey = 'art_obj_Id_no';

    public function Art_obj(){
        return $this->belongsTo(Art_obj::class,'art_obj_Id_no','Id_no');
    }

    public function Collection(){
        return $this->hasOne(Collection::class,'Collections_Name');
    }
}