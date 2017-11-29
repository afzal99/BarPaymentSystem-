<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Item;
use App\Transformers\ItemTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(5);
        $itemsCollection = $items->getCollection();
      

        return fractal()
        ->collection($itemsCollection)
        ->parseIncludes(['user'])
        ->transformWith(new ItemTransformer)
        ->paginateWith(new IlluminatePaginatorAdapter($items)) 
        ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $item= new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->purchase_price = $request->purchase_price;
        $item->retail_price = $request->retail_price;
        $item->user()->associate($request->user());
        
        $item->save();

        return fractal()
        ->item($item)
        ->parseIncludes(['user'])
        ->transformWith(new ItemTransformer)
        ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return fractal()
        ->item($item)
        ->parseIncludes(['user'])
        ->transformWith(new ItemTransformer)
        ->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    { 
        $item->name = $request->get('name',$item->name);
        $item->description = $request->get('description',$item->description);
        $item->purchase_price = $request->get('purchase_price',$item->purchase_price);
        $item->retail_price = $request->get('retail_price',$item->retail_price);
    
        $item->save();

        return fractal()
        ->item($item)
        ->parseIncludes(['user'])
        ->transformWith(new ItemTransformer)
        ->toArray();
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response(null, 204);
    }
}
