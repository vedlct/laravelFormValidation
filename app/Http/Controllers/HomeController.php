<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use Auth;
use Validator;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function insert(Request $r){

        $this->validate($r,[

             'name' => 'required|max:5',
            'contact' => 'required',
        ]);

        /*$validator = Validator::make($r->all(), [
            'name' => 'required|max:5',
            'contact' => 'required',
        ]);*/

       
       
             $emp=new Employees;
        $emp->empName=$r->name;
        $emp->empContact=$r->contact;
        $emp->assignedBy=Auth::user()->id;

        $emp->save();

      

      

        return "done";


    }
}
