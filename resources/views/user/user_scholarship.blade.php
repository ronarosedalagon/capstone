<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.master')

@section('title')
    Student Affairs: Information System
@endsection

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
                    <li class="nav-item active">
                                <a class="nav-link" href="/user-scholarship">
                                <i class="fa fa-book" aria-hidden="true"></i>Scholarship
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="/user-organization">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>Organization
                                </a>
                    </li>
                    <li class="nav-item dropdown">
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

@section('content')

<div class="row">
    <div class="col-md-12" st>
        <div class="card">
            <div class="card-header">
                <!-- dashboard header title -->
                <h4 class="card-title"> Scholarship </h4>
            </div>
            <div class="card-body">

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