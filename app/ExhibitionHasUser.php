<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionHasUser extends Model
{
    protected $table = 'exhibition_has_users';
    protected $fillable = ['list_no','exhibition_id','username_id'];
    protected $primaryKey = 'list_no';

    public function Exhibition(){
        return $this->belongsTo(Exhibition::class,'exhibition_id');
    }

    public function User(){
        return $this->belongsTo(Art_obj::class,'username_id');
    }
}
