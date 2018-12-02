<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $fillable = ['Artist_id','Name','Date_Born','Date_Died','Country_of_origin','Epoch','Main_style','Description','picture'];
    protected $primaryKey = 'Artist_id';

    public function Art_obj(){
        return $this->hasMany(Art_obj::class,'Name');
    }
}
