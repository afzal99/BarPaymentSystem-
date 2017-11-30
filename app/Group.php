<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=[
    	'name',
        'discount_percentage'       
    ];


    public function customer(){
        return $this->belongsToMany('App\Customer');
    }
}
