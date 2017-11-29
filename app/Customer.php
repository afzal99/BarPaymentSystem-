<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
    	'name',
        'email',
        'password',
        'secret'        
    ];
    protected $hidden = [
        'password',
    ];


    public function sale(){
        return $this->hasMany('App\Sale');
    }
    
}
