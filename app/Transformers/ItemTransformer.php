<?php

namespace App\Transformers;
use App\Item;

class ItemTransformer extends \League\Fractal\TransformerAbstract{

        protected $availableIncludes = ['user'];
        public function transform(Item $item)
        {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'description'  => $item->description,
                'created_at' => $item->created_at->toDateTimeString(),
                'created_at_human' => $item->created_at->diffForHumans()
            ];

        }

        public function includeUser(Item $item)
        {
            return $this->item($item->user, new UserTransformer);
        }
}