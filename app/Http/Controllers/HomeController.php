<?php

namespace App\Http\Controllers;

use App\User;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


      
       if(empty(Auth::user()->getRoleNames()[0])){
        return view('home'); 

       }else{
        return redirect()->route('tickets.index'); 
       
       }
       
      
         
    }

}
