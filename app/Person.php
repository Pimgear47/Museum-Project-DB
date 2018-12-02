<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'contact_persons';
    protected $fillable = ['Contact_id','Name','Address','Phone',];
    protected $primaryKey = 'Contact_id';

    public function Collection(){
        return $this->hasOne(Collection::class,'Name');
    }
}
