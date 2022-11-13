<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.master')

@section('title')
    Dashboard | Scholarship
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
    <div class="col-md-12" st>
        <div class="card">
        <div class="card-header col-md-12 text-right">
            
            <!-- action buttons -->
            <div class="btn-group" role="group" aria-label="Basic example">

            <a href="/admin-scholarship/add" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Add</a>
            <a href="/admin-scholarship/manage" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Manage</a>
            <a href="/admin-scholarship/manage" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Unpublished</a>

            </div>

        </div>
        
        <div class="card-body" style="margin-top:-2%;">
        <h4 class="card-title text-center">SCHOLARSHIPS OFFERED</h4>

            <!-- scholarship post row -->
                <div class="row scholarship">

                @foreach($scholar as $scholarship)
                    <div class="col publication-publicationcol d-flex">
                    
                        <!-- start -->
                        <div class="publication-inside-box text-center">
                            <div>
                                <p class="" id="publication-headline">
                                {{ $scholarship->scholarship_name }}
                                </p>
                            </div>
                            <div class="image-wrap">		
                                <img src="{{ asset('storage/assets/scholarships/'.$scholarship->scholarship_photo) }}" />     
                            </div>
                           <div class="publication-viewbutton-margin">
                           <a id="link_button-557-74" class="ct-link-button" href="{{ asset('assets/file/'.$scholarship->scholarship_file)}}" target="_blank"> Requirements </a>
                           </div>
                        </div>
                        <!-- end -->
                    </div>
                    @endforeach   
                    </div>
                </div>
                <!-- end of scholarship row -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection