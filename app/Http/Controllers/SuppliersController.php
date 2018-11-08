<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the suppliers
        $suppliers=Supplier::orderBy('id')->simplePaginate(10);

        //load the view and pass the suppliers
        return View('suppliers.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('suppliers.create');
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
            'email'=>'required',
            'contactPerson'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        //Create supplier
        $supplier=new Supplier;
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->contactPerson=$request->input('contactPerson');
        $supplier->phone=$request->input('phone');
        $supplier->address=$request->input('address');
        $supplier->save();

        //redirect to suppliers.index
        Session::flash('message', 'Successfully created a supplier!');
        return Redirect('/suppliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //go to find supplier page
        $supplier = Supplier::find($id);
        return view('suppliers.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //find the supplier with id
         $supplier = Supplier::find($id);

         return view('suppliers.edit')->with('supplier', $supplier);
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
            'email'=>'required',
            'contactPerson'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        //Create supplier
        $supplier=Supplier::find($id);
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->contactPerson=$request->input('contactPerson');
        $supplier->phone=$request->input('phone');
        $supplier->address=$request->input('address');
        $supplier->save();

        //redirect to suppliers.index
        Session::flash('message', 'Successfully updated supplier!');
        return Redirect('/suppliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //go to find supplier page for delete
        $supplier = Supplier::find($id);
        return view('suppliers.delete')->with('supplier', $supplier);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete supplier
        $supplier=Supplier::find($id);
        $supplier->delete();
        
        //redirect to categories.index
        Session::flash('message', 'Successfully deleted supplier!');
        return Redirect('/suppliers');
    }
}
