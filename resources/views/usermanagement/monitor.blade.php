@extends('template')

@section('title')
 <title>MNCH | {{$title}}</title>
@endsection
@section('pageinfo')

 
         
  @endsection







@section('content')


 {!! Form::open() !!}     



                         {!! Form::close() !!}



                        

  
     <div class="box box-primary">
                <div class="box-header">

                <button style="float:right" id="print-button" >Print</button>
                  <h3 class="box-title">

                  Progress Review
                  </h3>
                </div>      
<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a aria-expanded="true" href="#tab_1" data-toggle="tab">General</a></li>
                  <li class=""><a aria-expanded="false" href="#tab_2" data-toggle="tab">Today's Data Entry</a></li>
                  <li class=""><a aria-expanded="false" href="#tab_3" data-toggle="tab">Total Data Entry</a></li>
                  
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <!-- /.box-header -->

                  <span style="color:red">>> Click on the labels to open/close panels</span>
                  <br>
                   @foreach($surveys as $survey)
                    @if(($survey->surveyID=='CHV2') || ($survey->surveyID=='MNHV2') || ($survey->surveyID=='IMCIV1') )
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$survey->surveyID}}">
                            @if($survey->surveyID=='CHV2')

                            Child Health 
                              <small>
                            ( <?php   
                              echo sizeof($ch);

                             ?> 

                             Records )
                             </small>
                            
                            @elseif($survey->surveyID=='MNHV2')

                            Maternal and Neonatal Health

                                   <small>
                            ( <?php   
                              echo sizeof($mnh);

                             ?> 

                             Records )
                             </small>




                            @elseif($survey->surveyID=='IMCIV1')

                            Integrated Management of Childhood Illness

                                   <small>
                            ( <?php   
                              echo sizeof($imci);

                             ?> 

                             Records )
                             </small>




                            @endif




                             <small id="{{$survey->surveyID}}status_info">
                             </small>






                           


                          </a>

                        </h4>
                      </div>
                      <div id="collapse{{$survey->surveyID}}" class="panel-collapse collapse">
                        <div class="box-body">
<table style="float:right">
                         <tr>
                                  <td><a id="excel{{$survey->surveyID}}">Download Excel</a></td>                   
                           </tr>
                           
                      </table>
                
                <br>
                <br>
                <table id="example1{{$survey->surveyID}}" cellspacing="0"  class="table table-bordered table-striped">
  



                    <thead>

                      <tr>

                     
                        
                        <th>Version</th>
                        <th>Assessment Term</th>
                        <th>Assessor</th>
                         <th>Date</th>
                         <th>Facility</th>
                         <th >County</th>
                         <th>Entered by</th>
                        

                        <th class="hideprint">Action</th>

                        
                        
                  
                      </tr>
                    </thead>
                    <thead>
                      <tr>

                     
                        
                        <th>Version</th>
                        <th>Assessment Term</th>
                        <th>Assessor</th>
                         <th>Date</th>
                         <th>Facility</th>
                         <th >County</th>
                         <th>Entered by</th>
                        

                        <th class="hideprint">Action</th>

                        
                        
                  
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                        @foreach($user_monitor as $user)
                         @if(substr($user->Survey,0,2)==substr($survey->surveyID,0,2))
                        <tr>
                     <td>

                                {{$user->Version}} :{{$user->Runtime}}

                         </td>
                        <td > {{ $user->Assessment_Term}}</td>
                        <td > {{ $user->assname}}</td>
                        <?php
                          $date= date_create($user->Date);
                          $dateformated=date_format($date,'d F Y');
                         ?>
                        <td><?php echo $dateformated?>  </td>
                        <td >{{ $user->FacilityName}}  </td>
                        <td  >{{$user->County}}</td>
                        <td >{{ $user->username}} </td>
                        @if($user->Status=='Submitted')
 <td class="hideprint"><form action="/assessments/show/{{$user->Assessment_ID}}">
    <input class="btn btn-primary form-control" type="submit" value="VIEW"></form></td>   
               @elseif($user->Status=='Incomplete' || $user->Status=='New')

       <td><form class="theresume" AssID="{{$user->Assessment_ID}}" bad="{{isset($user->assname)}}">
    <input class="btn btn-primary form-control" type="submit" value="RESUME"></form></td>

     @else

      <td> {{$user->Status}}</td>

     @endif
                        
                       
                       </tr>
                       @endif
                         @endforeach



   

                    

                     
                    </tbody>
                    <tfoot>
                      <tr>

                      
                       <th>Version</th>
                        <th>Assessment Term</th>
                        <th>Assessor</th>
                         <th>Date</th>
                         <th>Facility</th>
                         <th>County</th>
                         <th>Entered by</th>
                        

                        <th class="hideprint">Action</th>
                        
                        
                  
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                      </div>
                    </div>

                @endif
              @endforeach
                  </div><!-- /.tab-pane -->





                  <div class="tab-pane" id="tab_2">
                  <span style="color:red"> >> Click on the labels to open/close panels</span>
                      @foreach($surveys as $survey)
                                         @if(($survey->surveyID=='CHV2') || ($survey->surveyID=='MNHV2') || ($survey->surveyID=='IMCIV1') )

                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2{{$survey->surveyID}}">
                             @if($survey->surveyID=='CHV2')

                            Child Health




                            @endif
                            @if($survey->surveyID=='MNHV2')

                            Maternal and Neonatal Health




                            @endif
                            @if($survey->surveyID=='IMCIV1')

                            Integrated Management of Childhood Illness




                            @endif
                          </a>
                        </h4>
                      </div>
                      <div id="collapse2{{$survey->surveyID}}" class="panel-collapse collapse">
                        <div class="box-body">
                         <table id="example2{{$survey->surveyID}}" class="table table-bordered table-striped">
  


                  
                    <thead>
                    <tr >
                    <?php
                      echo date('d F Y');
                     

      
     ?>

                   

              
              
                       
                     

                         
                     


                    </tr>



                      <tr>

                     
                        
                        <th>County</th>
                        
                        <th>Submitted Surveys </th>
                        <th>Incomplete Surveys </th>
                        <th>Action</th>
                        
                  
                      </tr>
                    </thead>
                    
                    <tbody>
                   <!--  -->

                        @foreach($counties_assessed as $county)

                        <tr>
                        
                        <td>
                          
                         {{$county->Name}}
                        </td>

                        <td> 
                       
                        @foreach($submittedt as $subt)
                            @if($county->Name==$subt->County && $subt->Description==$survey->Description)
                                
{{$subt->submitted}}
                                

                                

                            @endif


                        @endforeach
                                                     

                              
                  
                      </td>




                        <td > 

                         @foreach($incompletet as $inct)
                            @if($county->Name==$inct->County && $inct->Description==$survey->Description)
                                
{{$inct->incomplete}}
                                

                                

                            @endif

                        @endforeach

                                
                      
                        </td>





                        
        
                    

<td class="hideprint"><form action="/usermanagement/export/{{$location}}/todayentry/{{$county->Name}}/{{$survey->surveyID}}">
    <input class="btn btn-primary form-control" type="submit" value="DOWNLOAD"></form></td>   

                       
                       
                        
                        
                       
                       </tr>
                       
                        
                        
                       
                       </tr>
                         @endforeach



   

                    

                     
                    </tbody>
                    <tfoot>
                      <tr>

                     
                        
                         <th>County</th>
                        
                        <th>Submitted Surveys </th>
                        <th>Incomplete Surveys </th>
                        <th>Action</th>
                    
                        
                  
                      </tr>
                    </tfoot>
                  </table>
                        </div>
                      </div>
                    </div>
                                  <script type="text/javascript">
                                
   </script>
                    @endif

                    @endforeach



                    
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                  <span style="color:red">>> Click on the labels to open/close panels</span>


                  @foreach($surveys as $survey)


                                         @if(($survey->surveyID=='CHV2') || ($survey->surveyID=='MNHV2') || ($survey->surveyID=='IMCIV1') )
                  <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3{{$survey->surveyID}}">
                            @if($survey->surveyID=='CHV2')

                            Child Health




                            @endif
                            @if($survey->surveyID=='MNHV2')

                            Maternal and Neonatal Health




                            @endif
                            @if($survey->surveyID=='IMCIV1')

                            Integrated Management of Childhood Illness




                            @endif
                          </a>
                        </h4>
                      </div>

                      <div id="collapse3{{$survey->surveyID}}" class="panel-collapse collapse">
                        <div class="box-body">
 <table id="example3{{$survey->surveyID}}" class="table table-bordered table-striped">
  


                  
                    <thead>
              



                      <tr>

                     
                        
                        <th>County</th>
                        
                        <th>Submitted Surveys </th>
                        <th>Incomplete Surveys </th>
                        <th>Action</th>
                        
                  
                      </tr>
                    </thead>
                    
                    <tbody>
                   <!--  -->

                        @foreach($counties_assessed as $county)
                        <tr>

                      

                        
                        <td> {{$county->Name}}</td>

                        <td> 
                               
                        @foreach($submitted as $sub)
                              @if($county->Name==$sub->County && $sub->Description==$survey->Description)
                                
                                  {{$sub->submitted}}
                           
                            @endif

                        @endforeach
                                                   
                  
                      </td>




                        <td > 

                           @foreach($incomplete as $inc)
                              @if($county->Name==$inc->County && $inc->Description==$survey->Description)
                                
{{$inc->incomplete}}
                                

                                

                            @endif

                        @endforeach

                               


                      
                        </td>



                        
        
                    

<td class="hideprint"><form action="/usermanagement/export/{{$location}}/totalentry/{{$county->Name}}/{{$survey->surveyID}}">
    <input class="btn btn-primary form-control" type="submit" value="DOWNLOAD"></form></td>   

                       
                       
                        
                        
                       
                       </tr>
                       
                        
                        
                       
                       </tr>
                         @endforeach



   

                    

                     
                    </tbody>
                    <tfoot>
                      <tr>

                     
                        
                         <th>County</th>
                        
                        <th>Submitted Surveys </th>
                        <th>Incomplete Surveys </th>
                        <th>Action</th>
                    
                        
                  
                      </tr>
                    </tfoot>
                  </table>                      
                    </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div>

</div>


 @foreach($surveys as $survey)
 @if($survey->surveyID=='CHV2'|| 'MNHV2'||'IMCIV1')
  <script type="text/javascript">

</script>
@endif
@endforeach





@endsection



 @section('javascript')

  



 
  

 <!-- DATA TABLES -->


 @foreach($surveys as $survey)
                     @if(($survey->surveyID=='CHV2') || ($survey->surveyID=='MNHV2') || ($survey->surveyID=='IMCIV1') )


       
        <script type="text/javascript">



         $(".theresume").submit(function(e) { 

        var AssID = $(this).attr('AssID');
        var Bad = $(this).attr('Bad');

      

        var token = $('input[name=_token]').val();
          e.preventDefault();


            var data = {

        'action':'check',
        'AssID':AssID,
       '_token': $('input[name=_token]').val()

    };

   


     $.ajax({

    
      url: '/survey/session',
      type: "post",
       data: data,
       error: function(){

        alert('Unable to perform request');

       },
      success: function(data){

      

       

              if(!data){

             

             if(Bad) window.location = ('{{URL::asset("/assessments/resume/")}}/'+AssID);
           else window.location = ('{{URL::asset("/assessments/badresume/")}}/'+AssID);

           }else if(data){


            alert('This survey is currrently being filled, please try again a few minutes later');


           }




      }
    });




     

        


          return false;



});
       
 
 
$(document).ready(function() {


      



  


var table=$('#example1{{$survey->surveyID}}').DataTable( 
 {
   
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select='<select id="{{$survey->surveyID}}' + column.index()+ '"class="colms" style="width:100%"  ><option style="width:100%" value=""></option></select>';

                var select = $(select)
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option style="width:100%" value="'+d+'">'+d+'</option>' )
                } );
            } );

        }



    } );


  //   $('#refresh{{$survey->surveyID}}').click(function()
  //     {
  // $('.colms').val("");
  // table.draw();

  //       });
 document.getElementById("example1{{$survey->surveyID}}_filter").style.display = 'none';
  $('#{{$survey->surveyID}}Action').hide();



  });

   

    </script>

    <script type="text/javascript">

 $(function () 
 {
       $('#example2{{$survey->surveyID}}').DataTable(

        {
           "aaSorting": [[ 1, "desc" ]]
         });
       

       $('#example3{{$survey->surveyID}}').DataTable(
       {
           "aaSorting": [[ 1, "desc" ]]

         });

     });




 $('#excel{{$survey->surveyID}}').click(function()
{
    

  ajax();
           
  });


function ajax2() {
 
    var data = {
          'version':$('#{{$survey->surveyID}}Version').val(),
          'term':$('#{{$survey->surveyID}}Assessment Term').val(),
          'assessor':$('#{{$survey->surveyID}}Assessor').val(),
          'date':$('#{{$survey->surveyID}}Date').val(),
          'facility':$('#{{$survey->surveyID}}Facility').val(),
          'county':$('#{{$survey->surveyID}}County').val(),
          'user':$('#{{$survey->surveyID}}Entered by').val(),

         '_token': $('input[name=_token]').val()
        
    };

   $.ajax({
       url: '/usermanagement/ajax',
      type: "post",
       data: data,
           success: function(data){

          var  testval = JSON.parse(data)['testval'];
          
    $('#testerval2').val(testval);
  }
 
   }); 




       

}

    
     






    </script>
@endif
 @endforeach



 <script type="text/javascript">


      $('#print-button').click(function()

      {
        
        $('.hideprint').hide();

          window.print();

      $('.hideprint').show();
               

      });


       $('#tester').click(function()
{
    

  ajax();
           
  });


function ajax() {
 
    var data = {
          'testval':$('#testerval').val(),
         '_token': $('input[name=_token]').val()
        
    };

   $.ajax({
       url: '/usermanagement/ajax',
      type: "post",
       data: data,
           success: function(data){

          var  testval = JSON.parse(data)['testval'];
          
    $('#testerval2').val(testval);
  }
 
   }); 




       

}




     

 </script>




        
  @endsection

 