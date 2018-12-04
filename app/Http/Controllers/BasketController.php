<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::get();
        $cats=Category::get();
        $best=Product::orderby('best','desc')->get();
        $elect=Product::get();
        $baskets=Basket::where('user_id',auth()->user()->id)->where('status','0')->get();
        $sum=0;
        if(count($baskets)>0){

            foreach ($baskets as $key=>$basket){
                $cost=$basket->price*$basket->count;
                $sum+=$cost;
            }
        }
        return view('basket/index',compact('category','product','best','elect','basket','sum','baskets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $id=$request->input('id');
            $product=Product::find($id);
            if(Basket::where([['user_id','=',auth()->user()->id],['product_id','=',$product->id],['status','=','0']])->get()->count() > 0){
                if(Basket::where([['user_id','=',auth()->user()->id],['product_id','=',$product->id],['status','=','0']])->first()->count==$product->count){
                    return response()->json(['count'=>'exceeded']);
                }
                else{
                    Basket::where([['user_id','=',auth()->user()->id],['product_id','=',$product->id],['status','=','0']])->first()->increment('count');
                }
            }
            else{
                Basket::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$product->id,
                    'price'=>$product->price,
                ]);
            }
            $count=count(Basket::where('user_id','=',auth()->user()->id)->where('ststus','0')->get());
            return response()->json(['basket_create'=>'success','count'=>$count]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
    }
}
