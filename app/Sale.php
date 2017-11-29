<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function item(){
        return $this->belongsToMany('App\Item');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    
}
