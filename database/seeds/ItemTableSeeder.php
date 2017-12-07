<?php

use Illuminate\Database\Seeder;
use App\Item;
class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item= new Item;
        $item->name = "Item 1";
        $item->description = str_random(20);
        $item->purchase_price = "100";
        $item->retail_price = "150";
        $item->group_id= "1";
        $item->user_id="1";
        
        $item->save();

        $item= new Item;
        $item->name = "Item 2";
        $item->description = str_random(20);
        $item->purchase_price = "100";
        $item->retail_price = "150";
        $item->group_id= "1";
        $item->user_id="1";
        
        $item->save();

        
    }
}
