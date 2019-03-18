
@extends('layouts.master')

@section('bodybaba')

<section class="home_banner_area">
    <div class="container box_1620">
       
         <div class="banner_content">

                <form method="POST" action="/profiless" enctype="multipart/form-data">
                    @csrf
                
           
<div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label" for="input-first-name">Update Image</label>
            <input id="avatar" class="form-control" type="file" name="avatar">
          </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">FORM SUBMIT</button>
</form>

         </div></div></section>