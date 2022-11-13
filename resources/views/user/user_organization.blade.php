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
                    <li class="nav-item active">
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


<!-- start of organization row -->
@section('content')

<div class="row">
    <div class="col-md-12" st>
        <div class="card">
            <div class="card-header">
                <!-- action buttons -->
                <div class="btn-group float-right" role= "group" aria-label="Basic example">
                <a href="/user-organization/register"><button type="button" class="btn btn-secondary">Apply for Org Accreditation</button></a>
                </div>
                <!-- dashboard header title -->
                <h4 class="card-title"> Organization </h4>
            </div>

            <div class="card-body">
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
                     <div class="col-10">
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