@extends('template')


@section('pageinfo')

@endsection 
         
 

@section('content')



          
          
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3C8DBC;"> <font color="#FFFFFF">Add Single User</font></div>
        <div class="panel-body">
          
      
 {!! Form::open(['url' => 'usermanagement/store']) !!}



 <div class="box-body">
@foreach($errors->all() as $errors)

<li style="color:red">{{$errors}}</li>

@endforeach
</div>



<div class="box-body">
            <div class="form-group">
              <label class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                     {!! Form::text('name',null,array('placeholder'=>'Enter  Name','id'=>'name','class'=>'form-control')) !!}
              </div>
            </div>
            </div>

           

<div class="box-body">
            <div class="form-group">
              <label class="col-md-4 control-label">County</label>
              <div class="col-md-6">

              <?php 
                $x=array();
                foreach ($counties as $county)
                {
                 $x[]=$county->Name;
                }

              ?>

 <?php $counter=0;  ?>
              <select class="form-control select2 " style="width: 100%;" name="county" id="county"> 
               <option value="" disabled selected>Select County</option>
                       @foreach($counties as $county)
                        
                       <option value =<?php echo $counter?> id ="{{$county->Name}}" >{{$county->Name}}</option>
                     <?php $counter++;  ?>
                        @endforeach


                        </select>
              </div>
            </div>
            </div>
<div class="box-body">
         <div class="form-group">
              <label class="col-md-4 control-label">Mobile Number</label>
              <div class="col-md-6">
                {!! Form::text('phone',null,array('placeholder'=>'Enter Mobile Number','id'=>'phone','class'=>'form-control')) !!}<span style="color:blue"> ( 0700100100 )</span>
              </div>
            </div>
            </div>
            <div class="box-body">

            <div class="form-group">
              <label class="col-md-4 control-label">ID Number</label>
              <div class="col-md-6">
                {!! Form::text('idnum',null,array('placeholder'=>'Enter ID Number','id'=>'idnum','class'=>'form-control')) !!}
              </div>
            </div>
            </div>
            <div class="box-body">
            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                {!! Form::email('email',null,array('placeholder'=>'Enter Email Address','id'=>'email','class'=>'form-control')) !!}<span style="color:blue"> ( example@site.com )</span>
              </div>
            </div>
</div>
<div class="box-body">
            <div class="form-group">
              <label class="col-md-4 control-label">Role</label>
              <div class="col-md-6">
                  <select class="form-control select2 " style="width: 100%;" name="role" id="role">
                       <option value="3" disabled selected>Select Role</option> 
               <option value="0" >County User</option>
               <option value="1" >Data Clerk</option>
               <option value="2" >Program User</option>
               <option value="3">System User</option>
               </select>


              </div>
            </div>
            </div>
            <br>
            <div class="box-body">
         <div class="form-group">
         
              <div class="col-lg-6">
            {!! Form::submit('Add User',['class' => 'use-address btn btn-primary form-control']) !!}
         </div>
            
          

           
            {!! Form::close() !!}
                     <div class="col-lg-6" >
            
<form action="/usermanagement/viewusers">
    <input class="btn btn-primary form-control" type="submit" value="Cancel and go back"></form>         </div>
   </div>
   </div>


            


            
         
         
             
            </div>
            </div>
            </div>
        </div>

     
   


 @endsection


@section('javascript')



<script type="text/javascript">
$(document).ready(function() {


      
    
  }
  );


 </script>
    @endsection