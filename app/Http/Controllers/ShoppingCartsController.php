<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JulioBitencourt\Cart\Cart;
use App\CartItem;

class ShoppingCartsController extends Controller
{
    protected $cart;

	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}
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
        $souvenir=Souvenir::find($id);
        $item=[
            'sku'=>$souvenir->id,
            'description'=>$souvenir->name,
            'price'=>$souvenir->price,
            'quantity'=>1
        ];

        $result=$this->cart->insert($item);
        return Response::json($this->$cart->totalItems()->toArray());
    }

    public function addItem($id)
    {
        $souvenir=Souvenir::find($id);
        $item=[
            'sku'=>$souvenir->id,
            'description'=>$souvenir->name,
            'price'=>$souvenir->price,
            'quantity'=>1
        ];

        $result=$this->cart->insert($item);
        return Response::json($this->$cart->totalItems()->toArray());
    }

    public function minusItem($id)
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
