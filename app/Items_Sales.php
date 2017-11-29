<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_Sales extends Model
{
    protected $fillable=[
    	'item_id',
    	'sale_id'
    ];
}
