<?php

namespace App\Transformers;
use App\Item_Group;

class ItemGroupTransformer extends \League\Fractal\TransformerAbstract{

        public function transform(Item_Group $itemGroup)
        {
            return [
                'id' => $itemGroup->id,
                'name' => $itemGroup->name,
                'description'  => $itemGroup->description,
                'created_at' => $itemGroup->created_at->toDateTimeString(),
                'created_at_human' => $itemGroup->created_at->diffForHumans()
            ];

        }

        // public function includeCustomer(Item_Group $itemGroup)
        // {
        //     return $this->group($itemGroup->user, new UserTransformer);
        // }
}