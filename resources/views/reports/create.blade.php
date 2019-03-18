@extends('layouts.master')

@section('bodybaba')

<section class="home_banner_area">
    <div class="container box_1620">
       
         <div class="banner_content">
                <div class="alert alert-success send" style="display:none"> 
                        <p>Mesage Saved and delivered </p>
                      </div>
              
                      <div class="alert alert-danger chuss" id="chawal" style="display:none"> 
                        <p>Mesage not Saved and not delivered </p>
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


    <form>
       
       @csrf
        <div class="form-group">
        <label for="Project Name: ">Project Name: </label>
        <input id="project_name" class="form-control {{ $errors->has('project_name') ? 'alert alert-danger' : '' }}" type="text" placeholder="Name of Project" name="project_name"  required>
      </div>
    <div class="form-group">
        <label for="my-input">textArea</label>
        <textarea id="project_description" class="form-control  {{ $errors->has('project_description') ? 'alert alert-danger' : '' }}" rows="3" name="project_description" ></textarea>
    </div>
        <div class="pl-lg-4">
        <div class="row">
        <div class="col-lg-4">

         <div class="form-group">
                  <label for="my-input">Number of Hours Spend: </label>
                  <input id="no_of_hours_spend" class="form-control {{ $errors->has('no_of_hours_spend') ? 'alert alert-danger' : '' }}" type="number" name="no_of_hours_spend" placeholder="Number of Hours Spend : " >
        </div>
        </div>
                    
        <div class="col-lg-8">
            <div class="form-group">
                <label for="my-input">Total Number of Hours: </label>
                <input id="no_of_total_hours" class="form-control {{ $errors->has('no_of_total_hours') ? 'alert alert-danger' : '' }}" type="number" name="no_of_total_hours" placeholder="Number of Hours Spend : "  >
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
    @include('layouts.errors')

<div class="col-lg-4 mx-auto">
    <button class="btn btn-primary" type="submit" id="submitform"name="submitform">Report submit</button>
</div>


    </form>
</div>

    </div></div></div></section>


  
    <script>
   $(document).ready(function(){

       $('#submitform').click(function(e){
               e.preventDefault();
               jQuery.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token:"]').attr('content')
                 }
               });
      
               jQuery.ajax({
                   url: "{{ url('/reports') }}",
                   method: 'post',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       project_name: jQuery('#project_name').val(),
                       project_description: jQuery('#project_description').val(),
                       no_of_hours_spend: jQuery('#no_of_hours_spend').val(),
                       no_of_total_hours: jQuery('#no_of_total_hours').val(),
                       time_in: jQuery('#time_in').val(),
                       time_out: jQuery('#time_out').val(),
                       no_of_hours_in_office: jQuery('#no_of_hours_in_office').val(),
                       no_of_hour_out_of_office: jQuery('#no_of_hour_out_of_office').val(),
                       
                    
                 },
                 success: function(result){

                    window.location='/reports';
       },
            error: function(result){

                $('.chawal').show();
                jQuery('.chawal').html(result.success);
}

});
                
              });
           });
</script> 

@endsection