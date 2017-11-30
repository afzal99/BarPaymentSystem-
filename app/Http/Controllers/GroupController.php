<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Group;
use App\Transformers\GroupTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(5);
        $groupsCollection = $groups->getCollection();
      

        return fractal()
        ->collection($groupsCollection)
        ->transformWith(new GroupTransformer)
        ->paginateWith(new IlluminatePaginatorAdapter($groups)) 
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
    public function store(StoreGroupRequest $request)
    {
        $group= new Group;
        $group->name = $request->name;
        $group->discount_percentage = $request->discount_percentage;

        $group->save();

        return fractal()
        ->item($group)
        ->transformWith(new GroupTransformer)
        ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return fractal()
        ->item($group)
        ->transformWith(new GroupTransformer)
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
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->name = $request->get('name',$group->name);
        $group->discount_percentage = $request->get('discount_percentage',$group->discount_percentage);
    
        $group->save();

        return fractal()
        ->item($group)
        ->transformWith(new GroupTransformer)
        ->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        
                //return response(null, 204);
return '
{
    "data"=> {
        "message":"Group deleted successfully"
    }
}';
    }
}
