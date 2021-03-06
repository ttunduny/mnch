@extends('template')

@section('title')
 <title>MNCH | {{$title}}</title>
@endsection

@section('pageinfo')

 
@endsection   



@section('cdns')

 

@endsection       
 

@section('content')



          
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3C8DBC;"> <font color="#FFFFFF">Change Password</font></div>
        <div class="panel-body">





        
   @if($error_message!='ok')




<div class="box-body">
<center><span style="color:red">{{$error_message}}</span></center>
@foreach($errors->all() as $errors)

<li style="color:red">{{$errors}}</li>




@endforeach



   {!! Form::open(['url' => 'usermanagement/update/pass/'.Auth::user()->id,'id'=>'demo-form']) !!}     

 <div class="box-body">
         <div class="form-group">
         <label class="col-md-4 control-label">Old Password :</label>

              <div class="col-md-4">
<input type="password" id="password" data-parsley-errors-container="#message1" name="old_password" data-parsley-trigger="keyup" data-parsley-minlength="6" required/>
</div>
<div id="message1" class="col-md-4">
  
</div>

</div></div>

 <div class="box-body">
         <div class="form-group">
         <label class="col-md-4 control-label">New Password :</label>

              <div class="col-md-4">
<input type="password" id="new_password" data-parsley-errors-container="#message2" name="new_password" data-parsley-trigger="keyup" data-parsley-minlength="6" required/>
  </div>
<div id="message2" class="col-md-4">
  
</div>

  </div></div>  

 <div class="box-body">
         <div class="form-group">
 <label class="col-md-4 control-label">Confirm New Password :</label>
        
              <div class="col-md-4">

<input type="password" id="new_password_confirmation" data-parsley-errors-container="#message3" name="new_password_confirmation" data-parsley-equalto="#new_password"  data-parsley-trigger="keyup" data-parsley-minlength="6" required/>
</div>
<div id="message3" class="col-md-4">
  
</div>


</div>
</div>




 <div class="box-body">
         <div class="form-group">
         
              <div class="col-md-12">
              <input type="submit" value="CHANGE PASSWORD" class="use-address btn btn-primary form-control">
         </div>
            </div>
            </div>
         
            
             {!! Form::close() !!}


           

             @else



              <div class="small-box bg-green">
                <div class="inner">
                  <h3><sup style="font-size: 20px"></sup></h3>
                  <p>Password Changed Successfully!</p>
                </div>
                <div class="icon">
                 
                </div>
              
              </div>






             @endif
        </div>
      </div>
    </div>
  </div>

        
  


 @endsection


@section('javascript')



<script type="text/javascript">

  $('#demo-form').parsley();



 </script>




@endsection