<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art_obj extends Model
{
    protected $table = 'art_objs';
    protected $fillable = ['Id_no','Artist','Year','Title','Description','Origin','Epoch','Type_of_art','Type_of_coll','Picture'];
    protected $primaryKey = 'Id_no';

    public function Donated_collection(){
        return $this->belongsTo(Permanent::class,'Id_no', 'art_obj_Id_no');
    }

    public function Permanent(){
        return $this->belongsTo(Permanent::class,'Id_no', 'art_obj_Id_no');
    }

    public function Borrowed(){
        return $this->belongsTo(Borrowed::class,'Id_no', 'art_obj_Id_no');
    }

    public function Sculpture(){
        return $this->belongsTo(Sculpture::class,'Id_no', 'art_obj_Id_no');
    }

    public function Statue(){
        return $this->belongsTo(Statue::class,'Id_no', 'art_obj_Id_no');
    }

    public function Other(){
        return $this->belongsTo(Other::class,'Id_no', 'art_obj_Id_no');
    }

    public function Artist(){
        return $this->hasOne(Artist::class,'Id_no');
    }

    public function ExhibitionHasArt(){
        return $this->hasMany(ExhibitionHasArt::class,'Id_no', 'art_obj_Id_no');
    }

}