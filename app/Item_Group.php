<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Group extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function items(){
        return $this->hasMany('App\Item');
    }
}
