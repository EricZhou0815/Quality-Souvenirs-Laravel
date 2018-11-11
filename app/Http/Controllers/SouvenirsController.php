<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use App\Category;
use App\Supplier;
use App\ShoppingCart;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SouvenirsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the souvenirs for product admin page
        $souvenirs=Souvenir::orderBy('id')->paginate(10);
        $categories=Category::all();
        $suppliers=Supplier::all();

        //load the view and pass the souvenirs
        return View('souvenirs.index')->with(['souvenirs'=>$souvenirs,'categories'=>$categories,'suppliers'=>$suppliers]);
    }

    public function filterByCategory($id)
    {   
        $souvenirs=DB::table('souvenirs')
                   ->select(DB::raw('*'))
                   ->where('category_id','=',$id)
                   ->get();
    return View('souvenirs.shop')->with('souvenirs',$souvenirs);
    }

    public function shop()
    {
        //get all the souvenirs for shop page
        $souvenirs=Souvenir::all();

        //load the view and pass the souvenirs
        return View('souvenirs.shop')->with('souvenirs',$souvenirs);
    }


    public function search(Request $request){
        $string=$request->SearchString;
        
        $souvenirs=DB::table('souvenirs')
                   ->select(DB::raw('*'))
                   ->where('name','LIKE','%'.$string.'%')
                   ->orWhere('price','LIKE','%'.$string.'%')
                   ->get();
        return View('souvenirs.shop')->with('souvenirs',$souvenirs);  
    }

    public function searchIndex(Request $request){
        $string=$request->SearchString;
        
        $souvenirs=Souvenir::where('name','LIKE','%'.$string.'%')
                   ->orWhere('price','LIKE','%'.$string.'%')
                   ->paginate(10);

                   //$souvenirs=DB::table('souvenirs')
                  // ->select(DB::raw('*'))
                  // ->where('name','LIKE','%'.$string.'%')
                  // ->orWhere('price','LIKE','%'.$string.'%')
                  // ->paginate(10);           
        return View('souvenirs.index')->with('souvenirs',$souvenirs);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $suppliers=Supplier::all();

        return View('souvenirs.create')->with(['categories'=>$categories,'suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'supplier_id'=>'required',
            'category_id'=>'required'
        ]);

        // Handle File Upload
        if($request->hasFile('imageUpload')){
            $fileNameToStore= $request->file('imageUpload')->getClientOriginalName();
            $request->file('imageUpload')->move(public_path('images/Souvenirs'), $fileNameToStore);
        } else {
            $fileNameToStore = '/images/kiwibird.jpeg';
        }

        //Create souvenir
        $souvenir=new Souvenir;
        $souvenir->name=$request->input('name');
        $souvenir->description=$request->input('description');
        $souvenir->price=$request->input('price');
        $souvenir->supplier_id=$request->input('supplier_id');
        $souvenir->category_id=$request->input('category_id');
        $souvenir->pathOfImage = $fileNameToStore;
        $souvenir->save();

        //redirect to categories.index
        Session::flash('message', 'Successfully created a souvenir!');
        return Redirect('/souvenirs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //go to find souvenir page
        $souvenir = Souvenir::find($id);
        return view('souvenirs.show')->with('souvenir', $souvenir);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        //go to find souvenir to display single product for user
        $souvenir = Souvenir::find($id);
        return view('souvenirs.display')->with('souvenir', $souvenir);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the category with id
        $souvenir = Souvenir::find($id);
        $categories=Category::all();
        $suppliers=Supplier::all();

        return view('souvenirs.edit')->with(['souvenir'=>$souvenir,'categories'=>$categories,'suppliers'=>$suppliers]);
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
         //validate input
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'supplier_id'=>'required',
            'category_id'=>'required',
        ]);


        //update souvenir
        $souvenir=Souvenir::find($id);
        $souvenir->name=$request->input('name');
        $souvenir->description=$request->input('description');
        $souvenir->price=$request->input('price');
        $souvenir->supplier_id=$request->input('supplier_id');
        $souvenir->category_id=$request->input('category_id');

        // Handle image File Upload
        if($request->hasFile('imageUpload')){
            $fileNameToStore= $request->file('imageUpload')->getClientOriginalName();
            $request->file('imageUpload')->move(public_path('images/Souvenirs'), $fileNameToStore);
            $souvenir->pathOfImage = $fileNameToStore;
        }

        //save souvenir
        $souvenir->save();

        //redirect to souvenirs.index
        Session::flash('message', 'Successfully update the souvenir!');
        return Redirect('/souvenirs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete souvenir
        $souvenir=Souvenir::find($id);
        $souvenir->delete();
        
        //redirect to categories.index
        Session::flash('message', 'Successfully deleted souvenir!');
        return Redirect('/souvenirs');
    }

    public function addToCart(Request $request, $id)
    {
        $souvenir=Souvenir::find($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new ShoppingCart($oldCart);
        $cart->add($souvenir,$souvenir->id);
        
        $request->session()->put('cart',$cart);

        //dd($request->session()->get('cart'));
        return Redirect ('/shop');
    }

    public function getCart(){
        $oldCart=Session::get('cart');
        $cart=new ShoppingCart($oldCart);
        return View('/souvenirs/shoppingCart')->with(['cartItems'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function addCartItem(Request $request, $id)
    {
        $souvenir=Souvenir::find($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new ShoppingCart($oldCart);
        $cart->add($souvenir,$souvenir->id);
        
        $request->session()->put('cart',$cart);

        $oldCart=Session::get('cart');
        $cart=new ShoppingCart($oldCart);

        //dd($request->session()->get('cart'));
        return Redirect ('/souvenirs/getCart')->with(['cartItems'=>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }

    public function minusCartItem(Request $request, $id)
    {
        $souvenir=Souvenir::find($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new ShoppingCart($oldCart);
        $cart->minus($souvenir,$souvenir->id);
        
        $request->session()->put('cart',$cart);

        $oldCart=Session::get('cart');
        //dd($request->session()->get('cart'));
        return Redirect ('/souvenirs/getCart')->with(['cartItems'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function clearCart(){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new ShoppingCart($oldCart);
        $cart->clear();

        return Redirect ('/souvenirs/getCart');

    }
}
