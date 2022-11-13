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
            <div class="row">
                <div class="col-sm-4">

                    <label><b>Step 1:</b> Click Request Button and Confirm your identity</label><br>
                    <label><b>Step 2:</b> Fill out the SAO Certification Request Form</label><br>
                    <label><b>Step 3:</b> Click Submit</label><br><br>

                </div>
                <div class="col-sm-8">

                    @if(Session::has('loginId'))
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Action</th>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>{{session('id')}}</td>
                                    <td>{{session('name')}}</td>
                                    <td>{{session('course')}}</td>
                                    <td>{{session('yearlevel')}}</td>
                                    <!-- <td> <input class="input" type="text" placeholder="fill me"> </td> -->
                                    <td>
                                        
                                    <button type="submit" id="verifyButton" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-sm button"> REQUEST </button>
           
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                            @if(Session::has('fail'))
                            <div class="alert alert-fail" style="background-color:red">{{Session::get('fail')}}</div>
                            @endif
                </div>
            </div>
           </div>

        </div>



        <!-- end of ID services content -->
    </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Confirmation Prompt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="GET" action="{{route ('saocert_confirm_request')}}">
                
            <div class="modal-body">
                <label>Please enter your account details to confirm this is you.</label> <br>
                <label for="inputID" class="col-sm-3 col-form-label">Student ID</label>
                <div class="col-sm-12">
                @if(Session::has('loginId'))
                <input type="text" class="form-control" readonly=readonly name="inputID" id="student_id" value="{{session('id')}}">           
                @endif
                </div>                
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-12">
                <input type="password" class="form-control" name="inputPassword" id="inputPassword">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm button"> CONFIRM </button>
            </div>
            </form>
            
            
        </div>
    </div>
</div>
</div>


@endsection

