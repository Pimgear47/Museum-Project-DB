<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $table = 'exhibitions';
    protected $fillable = ['Ex_id','Name','Start_date','End_date','Limit_visit','picture'];
    protected $primaryKey = 'Ex_id';

    public function ExhibitionHasUser(){
        return $this->hasMany(ExhibitionHasUser::class,'exhibition_id');
    }

}
