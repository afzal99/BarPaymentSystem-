<?php

namespace App\Transformers;
use App\Group;

class GroupTransformer extends \League\Fractal\TransformerAbstract{

        protected $availableIncludes = ['customer'];
        public function transform(Group $group)
        {
            return [
                'id' => $group->id,
                'name' => $group->name,
                'discount_percentage'  => $group->discount_percentage,
                'created_at' => $group->created_at->toDateTimeString(),
                'created_at_human' => $group->created_at->diffForHumans()
            ];

        }

        // public function includeCustomer(Group $group)
        // {
        //     return $this->group($group->customer, new UserTransformer);
        // }
}