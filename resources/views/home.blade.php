@extends('layouts.app')

@section('content')
<div class="container">
   
    <h2>INSERT EMPLOYEE</h2>
   <form class="form-horizontal" action="/home" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Name:</label>
    <div class="col-sm-10">
       <div style="color: red;"><i>{!! $errors->first('name', '<p class="help-block">:message</p>') !!}</i></div> 
      <input type="text" class="form-control" name="name" placeholder="Enter name">
      
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Contact number:</label>
    <div class="col-sm-10"> 
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
      <input type="text" class="form-control" name="contact" placeholder="Enter number">
      

    </div>
  </div>
   {!! csrf_field() !!}
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Insert</button>
    </div>
  </div>
</form>
</div>
@endsection