@extends('layouts.master')

@section('title')
		Report Details
@endsection

@section('bodybaba')
<script src="{{ asset('js/time.js')}}"></script>

<style>
     table, th, td {
            border: 2px solid black;
            width: 100px;
            height: 50px;
         }

</style>
<section class="welcome_area p_120">
    <div class="container">
        <div class="row welcome_inner">
                <div>
                    <h1 class="">full report submitted View:</h1>
                    <table class="table table-dark"  BORDER=2>
                            <col width="80">
                            <col width="800">
                            <thead class="thead-light">
                                    <tr>
                                      <th>Project Name</th>
                                      <th>Description</th>
                                      <th>no_of_hours_spend</th>
                                      <th>no_of_total_hours</th>
                                     
                                    </tr>
                                  </thead>
                        <tbody>
                            <tr>
                                <td>{{ $report->project_name}} </td>
                                <td>{{ $report->project_description}} </td>
                                <td>{{ $report->no_of_hours_spend}} </td>
                                <td>{{ $report->no_of_total_hours}} </td>
                               
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-dark">
                        <thead class="thead-light">
                            <tr>
                               <th>Time in</th>
                                <th>Time out</th>
                                <th>no_of_hours_in_office</th>
                                <th>no_of_hour_out_of_office</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td>{{ $report->time_in}} </td>
                                    <td>{{ $report->time_out}} </td>
                                    <td>{{ $report->no_of_hours_in_office}} </td>
                                    <td>{{ $report->no_of_hour_out_of_office}} </td>
                            </tr>
                        </tbody>
                       
                    </table>

                   
                </div>
              

                @if (Auth::check() && Auth::user()->id === $report->owner_id )
            

        <div class="container">
            <a href="/reports/{{ $report->id}}/edit" class="btn btn-warning">Edit</a>
          <br>
          <br>
          
            <form method="post" action="/reports/{{ $report->id }}">
              @method('DELETE')
              @csrf
                  <button class="btn btn-danger" id="del" >Delete</button>
                  
              </form>
                </div>
                @endif
        </div>
    </div>
</section>
    
@endsection