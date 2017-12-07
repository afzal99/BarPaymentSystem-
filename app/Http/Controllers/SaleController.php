<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Sale;
use App\Items_Sales;
use App\Transformers\SaleTransformer;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreSaleRequest $request)
    {
        $sale= new Sale;
        $sale->price = "0";
        $sale->user()->associate($request->user());

        foreach ($request->items as $each_item){
            $price = $each_item['quantity'] * DB::table('items')->where('id', $each_item['id'])->value('retail_price');
            $sale->price = $sale->price + $price;
        }

        $user_balance=DB::table('users')->where('id', $request->user()->id)->value('balance');

        if($user_balance > $sale->price)
        {
            $sale->save();

            foreach ($request->items as $each_item){
                $itemSales=new Items_Sales;
                
                $itemSales->sale_id = $sale->id;
    
                $itemSales->item_id = $each_item['id'];
                $itemSales->quantity = $each_item['quantity'];
                $itemSales->price = $itemSales->quantity * DB::table('items')->where('id', $each_item['id'])->value('retail_price');
                
    
                $itemSales->save();

                return "Sale Complete";
           }
        }
        else{
            return "Insufficient Balance";
        }
        

        //Auth::user()->products->sum('price');
        //$price = Item::sum('price')->find($company->id);
       // $request->input('item_id.0.id');

       // $items_list=$request->item_id;
       // $item_ids = explode(',',$items_list);

        

        

        
       


        
        // return fractal()
        // ->item($sale)
        // ->parseIncludes(['user'])
        // ->transformWith(new SaleTransformer)
        // ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
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
