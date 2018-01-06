<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chart;

class IndexController extends Controller
{
    public function index(){
    	$pie = Chart::get();

    	
    return view('welcome')->with('pie',$pie);
    }


    public function auto(){

    	return view('autocomplete');
    }

    public function search(Request $r){

    	if($r->ajax()){

            $output = array();

    		$values=Chart::where('title','LIKE','%'.$r->search.'%')->orWhere('value','LIKE','%'.$r->search.'%')->get();
    		//$values=Chart::get();
    		if($values){
    			foreach ($values as $key => $value){

                    array_push($output, $value->title);
    			}

    			return Response($output);

    			//return json_encode($output);
    			//return Response()->json($output);

    		}

    			else{
    				return Response()->json(['no'=>'not found']);
                }

        }

    }

}
