@extends('layouts.master')

@section('bodybaba')
<script src="{{ asset('js/time.js')}}"></script>

<section class="home_banner_area">
    <div class="container box_1620">
       
         <div class="banner_content">
                <div class="alert alert-success send" style="display:none"> 
                        <p>Mesage Saved and delivered </p>
                      </div>
              
                      <div class="alert alert-danger chuss" id="chawal" style="display:none"> 
                        <p>Mesage not Saved and not delivered </p>
                      </div>

                      <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                            </div>
                
                
                            <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                            </div>

    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="row align-items-center">
          <div class="col-4">
            <h3 class="mb-0">My account</h3>
          </div>
          <div class="col-4">
            <div class="col-4 text-centre">
                {{  date('Y-m-d')  
    
                }}
          </div>
          </div>
          
      <div class="col-4 text-right" id="timer">
      
   </div>
  
        </div>
      </div>
      <div class="card-body" style="color:burlywood;">


    <form id="report_form">
       
       @csrf
       <table class="table table-bordered" >
            <tr>
                <td> 
<div class="pl-lg-4">
        <div class="row">
                <div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Number of hours in office</label>
    <input id="no_of_hours_in_office" class="form-control {{ $errors->has('no_of_hours_in_office') ? 'alert alert-danger' : '' }}" name="no_of_hours_in_office" type="number" >
</div>
                </div>
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Number of hours out of office</label>
    <input id="no_of_hour_out_of_office" class="form-control {{ $errors->has('no_of_hour_out_of_office') ? 'alert alert-danger' : '' }}" name="no_of_hour_out_of_office" type="number" >
</div>
</div>

        </div>
    </div>
    
<div class="pl-lg-4">
        <div class="row">
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Time in </label>
    <input id="time_in" name="time_in" class="form-control {{ $errors->has('time_in') ? 'alert alert-danger' : '' }}" type="time" >
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Time out</label>
    <input id="time_out" class="form-control {{ $errors->has('time_out') ? 'alert alert-danger' : '' }}" name="time_out " type="time" >
</div>
</div>
        </div>
</div>
                </td>
</tr>
</table>

            {{-- table to add Projects in Report --}}


<table class="table table-bordered report_form" id="dynamic_field">
        <tr>
            <td>
    <div class="form-group">
                
        <div class="col-lg-8">
    <br>
        <label for="Project Name: ">Project Name: </label>
        <input id="project_name" class="form-control {{ $errors->has('project_name') ? 'alert alert-danger' : '' }} report_list" type="text" placeholder="Name of Project" name="project_name[]"  required>
      </div>
    </div>
    <div class="form-group">
        <label for="my-input">Description:</label>
        <textarea id="project_description" class="form-control  {{ $errors->has('project_description') ? 'alert alert-danger' : '' }} report_list" rows="3" name="project_description[]" ></textarea>
    </div>
        <div class="pl-lg-4">
        <div class="row">
        <div class="col-lg-8">

         <div class="form-group">
                  <label for="my-input">Number of Hours Spend: </label>
                  <input id="no_of_hours_spend" class="form-control {{ $errors->has('no_of_hours_spend') ? 'alert alert-danger' : '' }} report_list" type="number" name="no_of_hours_spend[]" placeholder="Number of Hours Spend : " >
        </div>
        </div>
                    
        
</div>

</div>
</td>
<td>
    <button type="button" name="add" id="add" class="btn btn-success">Add More Reports</button></td>
</tr>
</table>
</div>




    @include('layouts.errors')

<div class="col-lg-4 mx-auto">
    <button class="btn btn-primary" type="submit" id="submitform"name="submitform">Report submit</button>
</div>


    </form>
</div>

    </div></div></div></section>


  
    <script>
   $(document).ready(function(){
             var i = 1;
              $('#add').click(function(){
                 i++;
             $('#dynamic_field').append(' <tr id="row'+i+' class="dynamic-added""> <td> <div class="form-group"> <div class="col-lg-8"> <br> <label for="Project Name: ">Project Name: </label> <input id="project_name" class="form-control {{ $errors->has('project_name') ? 'alert alert-danger' : '' }} report_list" type="text" placeholder="Name of Project" name="project_name[]"  required> </div></div> <div class="form-group"> <label for="my-input">Description:</label> <textarea id="project_description" class="form-control  {{ $errors->has('project_description') ? 'alert alert-danger' : '' }} report_list" rows="3" name="project_description[]" ></textarea> </div><div class="pl-lg-4"> <div class="row"><div class="col-lg-4"> <div class="form-group"><label for="my-input">Number of Hours Spend: </label><input id="no_of_hours_spend" class="form-control {{ $errors->has('no_of_hours_spend') ? 'alert alert-danger' : '' }} report_list" type="number" name="no_of_hours_spend[]" placeholder="Number of Hours Spend : " ></div></div></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
                $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });


       $('#submitform').click(function(e){
           
        alert("startAjaxFormSubmit");
               e.preventDefault();
               jQuery.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token:"]').attr('content')
                 }
               });
               
                    //   console.log(data);
      
               jQuery.ajax({
                   url: "{{ url('/reports') }}",
                   method: 'post',
                   data: {
                       "_token": "{{ csrf_token() }}",
                      
                    //   "formArray" :$('.report_form').serialize(),
                  
                    //var data = $('input[name="project_name[]"]').serialize(),
                       project_name: $('input[name="project_name[]"]').serialize(),
                      
                       project_description: $('input[name="project_description[]"]').serialize(),
                       no_of_hours_spend: $('input[name="no_of_hours_spend[]"]').serialize(),
                       
                       time_in: $('#time_in').val(),
                       time_out: $('#time_out').val(),
                       no_of_hours_in_office: $('#no_of_hours_in_office').val(),
                       no_of_hour_out_of_office: $('#no_of_hour_out_of_office').val(),
                       
                    
                 },
                 
                
                 success: function(result){
                    if(result.error){
                        printErrorMsg(result.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                       // $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script> 

@endsection