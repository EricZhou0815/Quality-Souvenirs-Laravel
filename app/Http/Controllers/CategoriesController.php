<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the categories
        $categories=Category::orderBy('name','asec')->simplePaginate(10);

        //load the view and pass the categories
        return View('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('categories.create');
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
            'name' => 'required'
        ]);

        //Create category
        $category=new Category;
        $category->name=$request->input('name');
        $category->save();

        //redirect to categories.index
        Session::flash('message', 'Successfully created category!');
        return Redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //go to find category page
        $category = Category::find($id);
        return view('categories.show')->with('category', $category);
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
        $category = Category::find($id);

        return view('categories.edit')->with('category', $category);
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
            'name' => 'required'
        ]);

        //update category
        $category=Category::find($id);
        $category->name=$request->input('name');
        $category->save();

        //redirect to categories.index
        Session::flash('message', 'Successfully updated category!');
        return Redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete category
        $category=Category::find($id);
        $category->delete();
        
        //redirect to categories.index
        Session::flash('message', 'Successfully deleted category!');
        return Redirect('/categories');
    }
}
