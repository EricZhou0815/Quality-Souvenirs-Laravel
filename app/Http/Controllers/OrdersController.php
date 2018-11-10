<?php

namespace App\Http\Controllers;
use App\Souvenir;
use App\Category;
use App\Supplier;
use App\Order;
use App\OrderDetail;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //administrator to view all orders
    public function index()
    {
        $orders=Order::orderBy('id')->simplePaginate(10);
        return view('orders.index')->with('orders',$orders);
    }

    //admin to change order status
    public function orderStatus($id){
        $order=Order::find($id);
        $status=$order->status;
        if($status=='shipped'){
            $status='waiting';
        }
        if($status=='waiting'){
            $status='shipped';
        }
        $order->save();
        $orders=Order::all();
        return view('orders.index')->with('$orders',$orders);
    }

    //user to get order index with user_id
    public function indexUser($id){
        $user=User::find($id);
        $orders=$user->orders();
        return view('order.indexUser')->with('orders',$orders);
    }


    //user to display oerder details with order_id
    public function orderDetail($id){
        $order=Order::find($id);
        $orderDetails=$order->orderDetails();
        return view('orders.show')->with(['orderDetails'=>$orderDetails,'order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
