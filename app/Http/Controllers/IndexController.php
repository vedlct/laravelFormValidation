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
}
