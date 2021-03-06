

@extends('layouts.master')
@section('title')
Reports
@endsection
@section('bodybaba')

<section class="home_banner_area">
   <div class="container box_1620">
      <div class="banner_content">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-4">
                     <h3 class="mb-0">My Reports</h3>
                  </div>
                
                 <form class="col-7">
                     @csrf
                  <div class="form-group">
                     <label for="search">Search</label>
                     <input id="search" class="form-control" type="search">
                  </div>
                 </form>
               </div>
            </div>
          
            

<div class="card-body" id="all_data" style="color:blue;">

      <h3> Total data : <span id="total_data"></span></h3>
        @foreach ($report as $reports)
        
       
        <div class="ch">
              
           
           <ul>
              <div class="container-fluid mt--7">
                 <div class="card">
                    {{$reports->user->name }}
                    <h3><a href="/reports/{{ $reports->id }}">{{ $reports->project_name }}</a>  </h3>
                    <h5>date of creation :  {{ $reports->created_at->format('m/d/Y') }} 
                    </h5>
                    <h5> Time of creation : {{ $reports->created_at->format('H:i:s') }} </h5>
                 </div>
              </div>
           </ul>
           <br>
           <hr style="background-color: #fff;
              border-top: 2px dashed #8c8b8b">
           <br>
        </div>
        
        @endforeach
     </div>


         </div>
      </div>
   </div>
</section>
<script>
   
$('#search').keypress(function(event){


    
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){

      
      event.preventDefault();
             $.ajax({
                  url: "{{ url('/search') }}",
                  method: 'get',
                  data: {
                     "_token": "{{ csrf_token() }}",
                      search: $('#search').val(),
                  },
                  success: function(result){
                    console.log(result);
                     $('#all_data').html(result);
                   

                  }});
   }
   
   
    
});
</script>
@endsection



