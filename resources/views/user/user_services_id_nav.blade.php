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
                        <a href="/logout">
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
        <div class="card-header col-md-12 text-right">

        </div>
        
        <div class="card-body" style="margin-top:-2%;">
        <h4 class="card-title text-center">ID-CARD SERVICES</h4>
           
        </div>
        <div class="container">
        <div class="row">
            <div class="col-sm">
            <a href="/user-services/IDcard-Validation" class="btn btn-secondary btn-block active" role="button" aria-pressed="true">Validation</a>
            </div>
            <div class="col-sm">
            <a href="/user-services/IDcard-Printing" class="btn btn-secondary btn-block" role="button" aria-pressed="true">Printing</a>
            </div>
            <div class="col-sm">
            <a href="/user-services/IDcard-Reissuance" class="btn btn-secondary btn-block" role="button" aria-pressed="true">Re-issuance</a>
            </div>
        </div>
        <!-- start of ID services content -->
        

        <div style="margin-top:2%;padding-bottom:20px;">
        <h4>ID ENROLMENT VALIDATION</h4>
           <hr>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm" id="user_IDsearch">
                        <label><b>Step 1:</b> Search your ID number to check your enrolment status</label><br>
                        <label><b>Step 2:</b> If your enrolment is not yet updated, fill out the validation form</label><br>
                        <label><b>Step 3:</b> Click send request for validation</label><br><br>



                        <label><b>Search your ID number here to verfiy your enrolment:<br> </b></label> 
                        <form class="row" method="GET" action="{{route ('websearch')}}">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="queryID" placeholder="Enter your Student ID...">
                                    <span class="input-group-addon"><input type="submit" value="Search" class="btn btn-primary"></span>
                                </div>
                            </div>
                        </form>
                    </div>

                @if(isset($studentsdata))
                <table class="table table-hover table-striped table-bordered">
                     <thead>
                         <th>ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Course</th>
                         <th>Year Level</th>
                         <th>Status</th>
                         <th>Action</th>
                     </thead>
                     <tbody> 
                     @foreach ($studentsdata as $item)
                         <tr>
                             <td>{{ $item->student_id }}</td>
                             <td>{{ $item->first_name}}</td>
                             <td>{{ $item->last_name}}</td>
                             <td>{{ $item->course}}</td>
                             <td>{{ $item->year_level}}</td>
                             <td>{{ $item->status}}</td>
                             <td>
                                 <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#validateModal"> VALIDATE</button>
                                 </div>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                </table>
                @endif
                    
                    
                </div>
            </div>
        </div>
        <!-- end of ID services content -->
        </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script></script>
@endsection