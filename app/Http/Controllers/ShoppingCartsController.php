<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;

class ShoppingCartsController extends Controller
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
    public function store(Request $request)
    {
        //Create shoppingcart
        $shoppingCart=new ShoppingCart;
        $shoppingCart->id='1';
        $shoppingCart->save();
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

    public function addToCart($id)
    {
        $shoppingCart=ShoppingCart::all();
       
        if(!$shoppingCart){
            //Create shoppingcart
            $shoppingCart=new ShoppingCart;
            $shoppingCart->id='1';
            $shoppingCart->save();
        }
        else {
            $cartItem=DB::table('cartItems')
            ->select(DB::raw('*'))
            ->where('souvenir_id','=',$id)
            ->get(); 
            if(!$cartItem)
            {
                $cartItem=new CartItem;
                $cartItem->souvenir_id=$id;
                $cartItem->shoppingCart_id='1';
                $cartItem->count='1';
                $cartItem->save();
            }
            else{
                $cartItem->count++;
                $cartItem->save();
            }
        }
        $cartItems=DB::table('cartItems')
        ->select(DB::raw('*'))
        ->where('shoppingCart_id','=','1')
        ->get(); 
        return Response::json($cartItems->toArray());
    }

    public function addItem($id)
    {
        $cartItem=CartItem::find($id);
        $cartItem->count++;
        $cartItem->save();
        return Response::json($cartItem->count->toArray());
    }

    public function minusItem()
    {
        $cartItem=CartItem::find($id);
        $cartItem->count--;
        if($cartItem->count==0)
        {
            $cartItem->delete();
            return Response::json(0); 
        }
        else
        {
            $cartItem->save();
            return Response::json($cartItem->count->toArray());
        }
    }

    public function clearCart()
    {
        $cartItems=DB::table('cartItems')
        ->select(DB::raw('*'))
        ->where('shoppingCart_id','=','1')
        ->get(); 
        foreach($cartItems as $cartItem)
        {
            $cartItem->delete();
        }
        $shoppingCart=ShoppingCart::find(1);
        $shoppingCart->delete();
        return Redirect('/shop');
    }
}
