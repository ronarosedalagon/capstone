<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.master')

@section('title')
    Dashboard | Organization
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
                    <li class="nav-item dropdown active">
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
                    <li class="nav-item dropdown">
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

            <a href="/admin-organization/add" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Add</a>
            <a href="/admin-organization/manage" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Manage</a>
            <a href="/admin-organization/manage" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Unpublished</a>

            </div>

        </div>
        
        <div class="card-body" style="margin-top:-2%;">
        <h4 class="card-title text-center">ACCREDITED SCHOOL ORGANIZATIONS</h4>

            <div>
                 <!-- start of organization row -->
            <div class="col-sm-12">
            @foreach($org as $organization)
                <div class="row information_organization_row">
                    <div class="col-2">
                        <img width="190" height="190" src="{{ asset('storage/assets/organizations/'.$organization->organization_logo) }}" class="thumbnail wp-post-image img-fluid" alt="" loading="lazy" 
                        srcset="{{ asset('storage/assets/organizations/'.$organization->organization_logo) }}"sizes="(max-width: 150px) 100vw, 150px">		
                    </div>
            
                    <!-- news and updates right container -->
                     <div class="col-9">
                            <h2 class="entry-title"> {{ $organization->organization_name }} </h2>    
                            <h5 class="entry-details"> {{ $organization->organization_details }} </h5>       
                            
                            <a href='{{ $organization->organization_link }}'> {{ $organization->organization_link }} </a>             

                    </div>
                </div>
            @endforeach
</div>
                <!-- end of announcement posts row -->
            </div>
                            
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection