<?php

namespace App\Transformers;
use App\Sale;

class SaleTransformer extends \League\Fractal\TransformerAbstract{

    protected $availableIncludes = ['user'];

    public function transform(Sale $sale)
    {
        return [
            'id' => $sale->id,
            'created_at' => $sale->created_at->toDateTimeString(),
            'created_at_human' => $sale->created_at->diffForHumans()
        ];

    }

    public function includeUser(Sale $sale)
    {
        return $this->item($sale->user, new UserTransformer);
    }
}