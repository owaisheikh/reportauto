

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
          
            

<div class="card-body " id="hey" style="color:blue;">

   
        @foreach ($report as $reports)
        
        {{-- {{ dd($reports) }}  --}}
        <div class="changing">
              
           
           <ul>
              <div class="container-fluid mt--7">
                 <div class="card some">
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

@endsection



