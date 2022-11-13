<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>


</style>

@extends('layouts.master')

@section('title')
    Student Affairs: Information System
@endsection

<!-- start of side-bar links -->
@section('side-wrapper')
<div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                                <a class="nav-link" href="/user-announcements">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="/user-publications">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>Publication
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="/user-scholarship">
                                <i class="fa fa-book" aria-hidden="true"></i>Scholarship
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="/user-organization">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>Organization
                                </a>
                    </li>
                    <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-refresh" aria-hidden="true"></i>Services
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/user-services/IDcard">ID Card Services</a>
                            <a class="dropdown-item" href="/user-services/SAOCertificate">SAO Certification</a>
                            <a class="dropdown-item" href="">Graduation Photos</a>                                           
                            </div>
                    </li>
                    <li>
                            <a href="">
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            <p>Survey</p>
                            </a>
                    </li>
                    <li class="active-pro">
                        <a href="logout">
                            <i class="now-ui-icons sport_user-run"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
@endsection
<!-- end of side-bar links -->


<!-- start of organization row -->
@section('content')

<div class="row">
    <div class="col-md-12">
    <div class="card">
        
        <div class="card-body" style="margin-top:-2%;">
        <h4 class="card-title text-center">ID-CARD SERVICES</h4>
           
        </div>
        <div class="container">

        <!-- start of ID services content -->
        

        <div style="margin-top:2%;padding-bottom:20px;">
        <h4>SAO CERTIFICATE</h4>
           <hr>

           <div class="container">
           @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail')}}
                </div>
            @endif
                <div class="row">
                <div class="container">
                    <div class="row">
                            

                            <div class="col-md-12 col-md-offset-3">

                                <form action="send_saocert_request" method="post" enctype="multipart/form-data">
                                        
                                @csrf
                                    <div class="row form-group">

                                        <div class="col-sm-4">
                                        <label>Student ID</label>
                                        <input type="text" class="form-control" name="student_id" readonly="readonly" value="{{ session('id') }}">
                                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                                        </div>

                                        <div class="col-sm-4">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" name="student_name" readonly="readonly" value="{{ session('fullname') }}">
                                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                                        </div>

                                        <div class="col-sm-4">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" name="student_email" readonly="readonly" value="{{ session('email') }}">
                                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                                        </div>
                                        
                                    </div>

                                    <div class="row form-group ">


                                    </div>
                                        <label class="form-label" for="customFile">Payment Receipt</label>
                                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                                        <input type="file" class="form-control" id="customFile" name="photo" value="{{ old('file') }}"> <br>   
                                    
                                    
                                        <div class="form-group">
                                            <a href="/user-services/SAOCertificate"> <button type="button" class="btn btn-danger float-right"> BACK </button></a>
                                            <button type="submit" class="btn btn-info float-right"> REQUEST </button> 
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
           </div>

        </div>



        <!-- end of ID services content -->
    </div>
    </div>
</div>


@endsection

