<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=[
    	'name',
        'description',
        'purchase_price',
        'retail_price',
        'user_id',
        'group_id'    
    ];

    public function item_group(){
        return $this->belongsTo('App\Item_Group');
    }

    public function sale(){
        return $this->belongsToMany('App\Sale');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    
}
