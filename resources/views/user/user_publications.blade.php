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
                    <li class="nav-item active">
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
<!-- end of side-bar links -->


<!-- start of publications row -->
@section('content')
<div class="row">
    <div class="col-md-12" st>
        <div class="card">
            <div class="card-header">
               <!-- dashboard header title -->
                <h4 class="card-title"> The Phooenix - School Publications </h4>
            </div>
            <div class="card-body">

            <!-- publication post row -->
            
                <div class="row publication">
                    <!-- start of publication posts row -->

                    @foreach($pubs as $publication)
                    <div class="col publication-publicationcol">
                    
                        <!-- start -->
                        <div class="publication-inside-box ">
                            <div>
                                <p class="" id="publication-headline">
                                {{ $publication->publication_title }}
                                <h6 class="entry-timestamp"> {{ $publication->publication_date }} </h6>
                                </p>
                            </div>
                            <div class="image-wrap">		
                                <img src="{{ asset('storage/assets/publications/'.$publication->publication_photo) }}" />     
                            </div>
                           <div class="publication-viewbutton-margin">
                           <a id="link_button-557-74" class="ct-link-button" href="{{ asset('assets/file/'.$publication->publication_file)}}" target="_blank"> View </a>
                           </div>
                        </div>
                        <!-- end -->
                    </div>
                    @endforeach   
                </div>
                
                <!-- end of publications row -->
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection