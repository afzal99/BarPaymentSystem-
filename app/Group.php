<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=[
    	'name',
        'discount_percentage'       
    ];


    public function user(){
        return $this->belongsToMany('App\User');
    }
}
