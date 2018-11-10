<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use App\Category;
use App\Supplier;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function _constrcut(){
        $this->middleware('auth');
    }
    public function admin(){
        return view('admin');
    }

    public function member(){
        return view('users.index');
    }
    

}
