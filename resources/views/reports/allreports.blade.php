@extends('layouts.master')
@section('title')
Reports
@endsection
@section('bodybaba')

<script src="{{ asset('js/time.js')}}"></script>
@if(session()->has('message'))
<div class="alert alert-danger">
   {{ session()->get('message') }}
</div>
@endif
<section class="home_banner_area">
   <div class="container box_1620">
      <div class="banner_content">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-4">
                     <h3 class="mb-0">My Reports</h3>
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
            @foreach ($user as $users)
            <ul>
               <li> <a  href="#" onclick="load_report({{ $users->id }})" class="btn btn-primary detail" target="_new" >  {{ $users->name }}  </a> </li>
            </ul>
            @endforeach
            
         </div>
      </div>
   </div>
</section>
<script >

   function load_report(id){
    
     $.ajax({
                  url: "{{ url('/get-user-reports') }}"+'/'+id,
                  method: 'get',
                  success: function(result){
                     window.location='/get-user-reports/'+id;
                  }});
   
      }
</script>

@endsection