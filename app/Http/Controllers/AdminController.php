<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function _constrcut(){
        $this->middleware('auth');
    }
    public function admin(){
        return view('admin');
    }
}
