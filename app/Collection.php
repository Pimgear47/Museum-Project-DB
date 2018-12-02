<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $fillable = ['Coll_id','Name','Type','Description','picture','Contact_person_Name'];
    protected $primaryKey = 'Coll_id';

    public function Borrowed(){
        return $this->belongsTo(Borrowed::class,'Name','Collections_name');
    }

    public function Permanent(){
        return $this->belongsTo(Permanent::class,'Name','Collections_name');
    }

    public function Person(){
        return $this->belongsTo(Person::class,'Contact_person_Name','Name');
    }
}
