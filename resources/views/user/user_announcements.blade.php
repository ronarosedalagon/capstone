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
                    <li class="nav-item active">
                                <a class="nav-link" href="/user-announcements">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>Announcement
                                </a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link active" href="/user-publications">
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
                            <a class="dropdown-item" href="">SAO Certification</a>
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


<!-- start of announcements row -->
@section('content')
<div class="row">
    <div class="col-md-12" st>
        <div class="card">
            <div class="card-header">
                <!-- dashboard header title -->
                <h4 class="card-title"> Announcements </h4>
            </div>

            <div class="card-body">
            
            <!-- announcements row container -->
            <div class="row information_announcement_post-box">

            <!-- announcements left container -->
                <div class="col-sm-9"> <h3>News and Updates</h3>
                                
                    <!-- start of announcement posts row -->
                    @foreach($announce as $announcement)
                    <div class="row information_announcement_row1">

                        <!-- news and updates left container -->
                        
                        <div class="col-3">
                            <img width="150" height="140" src="{{ asset('storage/assets/announcements/'.$announcement->announcement_poster) }}" class="thumbnail wp-post-image img-fluid" alt="" loading="lazy" 
                            srcset="{{ asset('storage/assets/announcements/'.$announcement->announcement_poster) }}"sizes="(max-width: 150px) 100vw, 150px">		
                        </div>

                        <!-- news and updates right container -->
                        <div class="col-9">
                            <h6 class="entry-timestamp"> {{ $announcement->createdat }} </h6>
                            <h2 class="entry-title"> {{ $announcement->announcement_title }} </h2>    
                            <h5 class="entry-details"> {{ $announcement->announcement_details }} </h5>
                            <h3 class="entry-content"> {{ $announcement->announcement_content }} </h3>
                            Attached Link: 
                            <h2 class="entry-content">
                                <a href='{{ $announcement->announcement_link }}'> {{ $announcement->announcement_link }} </a></h3>
                                
                        </div>
                    </div>
                    @endforeach
                    <!-- end of announcement posts row -->

                </div>
                
                
                <!-- announcements right container -->
                <div class="col-sm-3 information_announcement_archives">Archives
                    <!-- list of archives column -->
                    <ul>
                        <li> <a href="https://cec.edu.ph/"> September 2022</a> </li>
                        <li> <a href="https://cec.edu.ph/"> August 2022</a> </li>
                        <li> <a href="https://cec.edu.ph/"> July 2022</a> </li>
                        <li> <a href="https://cec.edu.ph/"> June 2022</a> </li>
                    </ul>
                </div>      
                </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
<!-- end of announcements row -->


@section('scripts')

@endsection