@extends('layouts.master')

@section('bodybaba')

@include('layouts.session')
@if(session()->has('message'))
<div class="alert alert-danger">
    {{ session()->get('message') }}
</div>
@endif


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


      <form method="post" action="/reports/{{$report->id}}">
       
       @csrf
       @method('PATCH')
        <div class="form-group">
        <label for="Project Name: ">Project Name: </label>
        <input id="name" value="{{ $report->project_name}}" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" type="text" placeholder="Name of Project" name="project_name"  required>
      </div>
    <div class="form-group">
        <label for="my-input">textArea</label>
        <textarea id="my-input" class="form-control {{ $errors->has('project_description') ? 'alert alert-danger' : '' }}" rows="3" name="project_description" >{{ $report->project_description}}</textarea>
    </div>
        <div class="pl-lg-4">
        <div class="row">
        <div class="col-lg-4">

         <div class="form-group">
                  <label for="my-input">Number of Hours Spend: </label>
                  <input id="my-input" value="{{ $report->no_of_hours_spend}}" class="form-control {{ $errors->has('no_of_hours_spend') ? 'alert alert-danger' : '' }}" type="number" name="no_of_hours_spend" placeholder="Number of Hours Spend : " >
        </div>
        </div>
                    
        <div class="col-lg-8">
            <div class="form-group">
                <label for="my-input">Total Number of Hours: </label>
                <input id="my-input" value="{{ $report->no_of_total_hours}}" class="form-control {{ $errors->has('no_of_total_hours') ? 'alert alert-danger' : '' }}" type="number" name="no_of_total_hours" placeholder="Number of Hours Spend : "  >
            </div>
</div>
</div>
</div>


<div class="pl-lg-4">
        <div class="row">
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Time in </label>
    <input id="my-input" name="time_in" value="{{ $report->time_in}}" class="form-control {{ $errors->has('time_in') ? 'alert alert-danger' : '' }}" type="time" >
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Time out</label>
    <input id="my-input" class="form-control {{ $errors->has('time_out') ? 'alert alert-danger' : '' }}" value="{{ $report->time_out}}" name="time_out" type="time" >
</div>
</div>
        </div>
</div>

<div class="pl-lg-4">
        <div class="row">
                <div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Number of hours in office</label>
    <input id="my-input" class="form-control {{ $errors->has('no_of_hours_in_office') ? 'alert alert-danger' : '' }}" value="{{ $report->no_of_hours_in_office}}" name="no_of_hours_in_office" type="number" >
</div>
                </div>
<div class="col-lg-4">
<div class="form-group">
    <label for="my-input">Number of hours out of office</label>
    <input id="my-input" class="form-control {{ $errors->has('no_of_hour_out_of_office') ? 'alert alert-danger' : '' }}" value="{{ $report->no_of_hour_out_of_office}}" name="no_of_hour_out_of_office" type="number" >
</div>
</div>

        </div>
    </div>
    @include('layouts.errors')
<div class="col-lg-4 mx-auto">
    <button class="btn btn-primary" type="submit">Report submit</button>
</div>


    </form>
</div>
<div class="container">

    Again read the report :) 
</div>

@endsection