<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemGroupRequest;
use App\Http\Requests\UpdateItemGroupRequest;
use App\Item_Group;
use App\Transformers\ItemGroupTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemgroups = Item_Group::paginate(5);
        $itemgroupsCollection = $itemgroups->getCollection();
      

        return fractal()
        ->collection($itemgroupsCollection)
        ->transformWith(new ItemGroupTransformer)
        ->paginateWith(new IlluminatePaginatorAdapter($itemgroups)) 
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
    public function store(StoreItemGroupRequest $request)
    {
        $itemGroup= new Item_Group;
        $itemGroup->name = $request->name;
        $itemGroup->description = $request->description;

        $itemGroup->save();

        return fractal()
        ->item($itemGroup)
        ->transformWith(new ItemGroupTransformer)
        ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item_Group $itemgroup)
    {
        return fractal()
        ->item($itemgroup)
        ->transformWith(new ItemGroupTransformer)
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
    public function update(UpdateItemGroupRequest $request, Item_Group $itemgroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
