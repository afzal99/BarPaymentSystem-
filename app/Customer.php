<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
    	'name',
        'email',
        'contact',
        'secret'        
    ];
    protected $hidden = [
        
    ];


    public function sale(){
        return $this->hasMany('App\Sale');
    }

    public function group(){
        return $this->belongsToMany('App\Group');
    }
    
}
