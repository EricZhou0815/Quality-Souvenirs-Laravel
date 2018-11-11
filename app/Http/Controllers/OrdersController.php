<?php

namespace App\Http\Controllers;
use App\Souvenir;
use App\Category;
use App\Supplier;
use App\Order;
use App\OrderDetail;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //administrator to view all orders
    public function index()
    {
        $user_id = Auth::id();
        if($user_id>1)
        {
            $orders=DB::table('orders')
                    ->select(DB::raw('*'))
                    ->where('user_id','=',$user_id)
                    ->get();
        }
        elseif ($user_id==1)
        {
            $orders=Order::all();
        }
        return view('orders.index')->with('orders',$orders);
    }

    //admin to change order status
    public function orderStatus($id){
        $order=Order::find($id);
        if($order->status=='shipped'){
            $order->status='waiting';
        }
        elseif($order->status=='waiting'){
            $order->status='shipped';
        }
        $order->save();
    
        return Redirect('orders');
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
        return View('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate input
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city'=>'required',
            'postalCode'=>'required',
            'state'=>'required',
        ]);

        //Create order
        $order=new Order;
        $order->firstName=$request->input('firstName');
        $order->lastName=$request->input('lastName');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->city=$request->input('city');
        $order->postalCode=$request->input('postalCode');
        $order->status='waiting';
        
        $user_id = Auth::id();
        $order->user_id=$user_id;

        //get orderDetails from session
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new ShoppingCart($oldCart);
        $order->total=$cart->totalPrice;
        $order->gst=$order->total*0.15;
        $order->grandTotal=$order->total*1.15;
        $order->save();

        $id=$order->id;

        //create orderDetails from session
        //dd($cart);
        foreach ($cart->items as $item)
        {
            $orderDetail=new orderDetail;
            $orderDetail->order_id=$order->id;
            $orderDetail->souvenir_id=$item['souvenir']->id;
            $orderDetail->quantity=$item['count'];
            $orderDetail->save();
        }
        
        
        $order=Order::find($id);
        $orderDetails=$order->orderDetails()->get();


        //dd($orderDetails);
        //destroy session
        $request->session()->forget('cart');
        //redirect to orders.purchased
        Session::flash('message', 'Successfully place an order!');
        return view('orders.purchased')->with(['order'=>$order,'orderDetails'=>$orderDetails]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        $orderDetails=$order->orderDetails()->get();
            //dd($orderDetails);
            //dd($orderDetails);
        return view('orders.show')->with(['orderDetails'=>$orderDetails,'order'=>$order]);
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
