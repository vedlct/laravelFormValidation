@extends('layouts.app')

@section('content')


@include('pie')
<div class="container">

<div id="piechart" style="width: 900px; height: 500px;"></div>


    
   <div  ng-app="myApp" ng-controller="userController">
            <label>Country name</label>
             <input type="text" class="form-control" ng-model="country" ng-keytype="complete(country)">


         </div>






    </div>




@endsection