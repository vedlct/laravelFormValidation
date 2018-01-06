<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use Auth;
use Validator;
use Image;
use App\Photo;
use Session;

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



        Session::flash('message', 'Posted successfully');

        return redirect()->route('home');


    }


    public function imageUpload(Request $r){
        /*use Image Plugin from http://image.intervention.io/getting_started/installation
         *
         *
         *
         */

        $this->validate($r,[

            'image' => 'image|max:40000',

        ]);

        if ($r->hasFile('image')) {
            $img = $r->file('image');



            $image=new Photo;

            $image->save();



            $filename= $image->id.'.'.$img->getClientOriginalExtension();
            $image->image=$filename;
            $image->save();

            $location = public_path('images/'.$filename);
            //this is the image plugin
            Image::make($img)->resize(300,200)->save($location);



            Session::flash('message', 'Image Posted successfully');

            return redirect()->route('home');
        }


        return "not done";

    }
}
