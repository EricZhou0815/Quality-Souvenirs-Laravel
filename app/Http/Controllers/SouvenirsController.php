<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use App\Category;
use App\Supplier;
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

        //load the view and pass the souvenirs
        return View('souvenirs.index')->with('souvenirs',$souvenirs);
    }

    public function shop()
    {
        //get all the souvenirs for shop page
        $souvenirs=Souvenir::all();

        //load the view and pass the souvenirs
        return View('souvenirs.shop')->with('souvenirs',$souvenirs);
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
            'supplierName'=>'required',
            'categoryName'=>'required'
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
        $souvenir->supplierName=$request->input('supplierName');
        $souvenir->categoryName=$request->input('categoryName');
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
        ]);


        //update souvenir
        $souvenir=Souvenir::find($id);
        $souvenir->name=$request->input('name');
        $souvenir->description=$request->input('description');
        $souvenir->price=$request->input('price');
        $souvenir->supplierName=$request->input('supplierName');
        $souvenir->categoryName=$request->input('categoryName');

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
}
