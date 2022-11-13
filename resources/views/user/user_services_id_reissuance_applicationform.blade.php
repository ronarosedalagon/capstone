<head>
    @livewireStyles
</head>
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
                            <a class="dropdown-item" href="idcard">ID Card Services</a>
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
            <a href="/user-services/IDcard" class="btn btn-secondary btn-block " role="button" aria-pressed="true">Validation</a>
            </div>
            <div class="col-sm">
            <a href="/user-services/IDcard-Printing" class="btn btn-secondary btn-block" role="button" aria-pressed="true">ID Application Form</a>
            </div>
            <div class="col-sm">
            <a href="/user-services/IDcard-Reissuance" class="btn btn-secondary btn-block active" role="button" aria-pressed="true">Re-issuance</a>
            </div>
        </div>
        <!-- start of ID services content -->
        
        <div style="margin-top:2%;padding-bottom:20px;">
        <h4>ID REISSUANCE REQUEST FORM</h4>
           <hr>
           
           <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                        </form>
                        @livewire('reissuance-application-form')
                    </div>
                        



                </div>
            </div>
        </div>
        <!-- end of ID services content -->
        </div>
        </div>
    </div>
</div>

@livewireScripts
@endsection


@section('scripts')
<script></script>
@endsection