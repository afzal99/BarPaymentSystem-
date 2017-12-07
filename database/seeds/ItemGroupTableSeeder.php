<?php

use Illuminate\Database\Seeder;
use App\Item_Group;
class ItemGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemGroup= new Item_Group;
        $itemGroup->name = "Item Group 1";
        $itemGroup->description = str_random(30);

        $itemGroup->save();

        $itemGroup= new Item_Group;
        $itemGroup->name = "Item Group 2";
        $itemGroup->description = str_random(30);

        $itemGroup->save();

        
    }
}
