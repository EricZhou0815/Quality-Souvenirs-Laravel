<?php

namespace App;
use App\cartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;

class ShoppingCart
{
    public $items=null;
    public $totalQuantity=0;
    public $totalPrice=0;
    public $gst=0;
    public $grandTotal=0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items=$oldCart->items;
            $this->totalQuantity=$oldCart->totalQuantity;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }
    
    public function add($item, $id)
    {
        //$storedItem=new CartItem;
        $storedItem=['count'=>0,'price'=>$item->price,'souvenir'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem=$this->items[$id];
            }
        }
        $storedItem['count']++;
        $storedItem['price']=$item->price*$storedItem['count'];
        $this->items[$id]=$storedItem;
        $this->totalQuantity++;
        $this->totalPrice+=$item->price;
    }

    public function minus($item, $id)
    {
        $cart = Session::get('cart');
        $storedItem=$this->items[$id];
        $storedItem['count']--;
        $this->items[$id]=$storedItem;
        $this->totalQuantity--;
        $this->totalPrice+=$item->price;
        if($storedItem['count']==0)
        {
            
            //session()->forget('cart'.items[$id]);
            unset($cart->items[$id]);
            Session::put('cart', $cart);
            //dd($cart);
        }
        //else
        //{
        //$storedItem['price']=$item->price*$storedItem['count'];
        //$this->items[$id]=$storedItem;
        //$this->totalQuantity--;
        //$this->totalPrice+=$item->price;
        //Session::put('cart', $cart);
        //}
    }

    public function clear(){
        $cart = Session::get('cart');
        //$storedItem=$this->items[$id];
        session()->forget('cart');
    }

}
