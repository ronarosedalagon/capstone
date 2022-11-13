<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.master')

@section('title')
    Dashboard | Transactions
@endsection

@section('side-wrapper')
<div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ url('/admin') }}">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons ui-1_calendar-60"></i>Information
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin-announcement">Announcements</a>
                                    <a class="dropdown-item" href="/admin-publication">Publications</a>
                                    <a class="dropdown-item" href="/admin-scholarship">Scholarship</a>
                                    <a class="dropdown-item" href="/admin-organization">Organization</a>
                                </div>
                    </li>
                    <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons loader_refresh"></i>Transaction
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin-organization-application">Org Application</a>
                                    <a class="dropdown-item" href="/admin-IDCard-services">ID Card Services</a>
                                    <a class="dropdown-item" href="/admin-SAOcertificate">SAO Certificate</a>
                                </div>
                    </li>
                    <li>
                            <a href="{{ url('/admin-graduationphotos') }}">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Records</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>Survey
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin-survey-result">Survey Results</a>
                                    <a class="dropdown-item" href="/admin-survey-manage">Manage Survey</a>                                </div>
                    </li>
                    <li class="active-pro">
                        <a href="/admin-accounts-list">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Student Accounts</p>
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

@section('content')

<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header col-md-12 text-right">
            
            <!-- action buttons -->
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Pending</a>
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Approved</a>
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Incomplete</a>
            </div>

        </div>
        
        <div class="card-body" style="margin-top:-2%;">
            <h4 class="card-title text-center">APPLICATION FOR ORGANIZATION AND ACCREDITATION</h4>
            <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>President First Name</th>
                    <th>President Last Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Email</th>
                    <th>Org Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody> 
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->org_applicationID }}</td>
                        <td>{{ $item->president_lastname}}</td>
                        <td>{{ $item->president_firstname}}</td>
                        <td>{{ $item->president_course}}</td>
                        <td>{{ $item->president_year}}</td>
                        <td>{{ $item->president_email}}</td>
                        <td>{{ $item->org_name}}</td>
                        <td>{{ $item->created_at}}</td>
                        <td>{{ $item->application_status}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="/click_update_org_application/{{ $item->org_applicationID }}"> <button type="button" class="btn btn-info"> VIEW </button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection