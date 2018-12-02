<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionHasArt extends Model
{
    protected $table = 'exhibition_has_art_objs';
    protected $fillable = ['list_no','exhibition_id','art_obj_Id_no'];
    protected $primaryKey = 'list_no';

    public function Exhibition(){
        return $this->hasMany(Exhibition::class,'Ex_id');
    }

    public function Art_obj(){
        return $this->belongsTo(Art_obj::class,'art_obj_Id_no');
    }
}