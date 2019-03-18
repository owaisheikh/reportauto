@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <button class="btn btn-primary" type="button" onclick="window.location.href = '/profiles'">Profiles</button>

                    <button class="btn btn-secondary" type="button"  onclick="window.location.href = '/reports'" >Reports</button>


                 
                
                </div>
               
            </div>
            <div class="card-body">

                    @if ( $user->id === 1 )

                    <div>
                        <button class="btn btn-primary" type="button" onclick="window.location.href = '/adminpanel/admin'">Admin View</button>    
                        
                        <br>
                        <br>
                        <br>
                        <p style="font-size:40px; color:red;"> Quick Reports Views </p>

                        <button class="btn btn-info" type="button" onclick="window.location.href = '/reports'" >All Submitted Reports Reports</button>
                    </div>
                            
                            @endif
    
                    </div>   
        </div>
    </div>
</div>
@endsection
