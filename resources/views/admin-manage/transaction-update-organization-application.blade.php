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
                    <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_circle-08"></i>Accounts
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin-accounts-add">Add Student Account</a>
                                    <a class="dropdown-item" href="/admin-accounts-list">List of Student Accounts</a>                                </div>
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
        
        <div class="card-body" style="margin-top:-2%;">
            <h4 class="card-title text-center">APPLICATION FOR ORGANIZATION AND ACCREDITATION</h4> <br>
            
            @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail')}}
                </div>
            @endif

            <div class="col-md-12 col-md-offset-3">

                <form action="{{route('sendApproved.email')}}" method="post">
                        
                @csrf
                <h5>President Details</h5>
                <div class="row d-flex">
                    
                    <div class="col-md-3 col-md-offset-3">
                        <label class="form-label" for="customFile">First Name</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_lastname }}"> <br>  
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <label class="form-label" for="customFile">Last Name</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_firstname }}"> <br>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <label class="form-label" for="customFile">Course</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_course }}"> <br>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <label class="form-label" for="customFile">Year</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_year }}"> <br>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <label class="form-label" for="customFile">Contact Number</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_contactno }}"> <br>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <label class="form-label" for="customFile">Email</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->president_email }}"> <br>
                    </div>
                </div>                   
                <hr>
                <h5>Organization Details</h5>
                <div class="row d-flex">
                    
                    <div class="col-md-6 col-md-offset-3">
                        <label class="form-label" for="customFile">Organization Name</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->org_name }}"> <br>  
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <label class="form-label" for="customFile">Motto</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->org_motto }}"> <br>
                    </div>
                    <div class="col-md-4 col-md-offset-3">
                        <label class="form-label" for="customFile">Mission</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->org_mission }}"> <br>
                    </div>
                    <div class="col-md-4 col-md-offset-3">
                        <label class="form-label" for="customFile">Vision</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->org_vision }}"> <br>
                    </div>
                    <div class="col-md-4 col-md-offset-3">
                        <label class="form-label" for="customFile">Background</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="organization_logo" value="{{ $org_applications[0]->org_background }}"> <br>
                    </div>
                </div>                   
                <hr>
                <h5>Organization Files</h5>
                <div class="row d-flex">
                    
                    <div class="file-btn">
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <a id="link_button-557-74" class="ct-link-button" href="{{ asset('storage/assets/org_application_letters/'.$org_applications[0]->org_application_letter)}}" target="_blank"> Application Letter </a>
                    </div>

                    <div class="file-btn">
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <a id="link_button-557-74" class="ct-link-button" href="{{ asset('storage/assets/org_officer_list/'.$org_applications[0]->org_officer_list)}}" target="_blank"> Officer List </a>
                    </div>

                    <div class="file-btn">
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <a id="link_button-557-74" class="ct-link-button" href="{{ asset('storage/assets/org_plan/'.$org_applications[0]->org_plan)}}" target="_blank"> Organization Plan</a>
                    </div>
                    
                    <div class="file-btn">
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <a id="link_button-557-74" class="ct-link-button" href="{{ asset('storage/assets/org_fundreport_/'.$org_applications[0]->org_fundreport)}}" target="_blank"> Fund Report </a>
                    </div>

                    <div class="file-btn">
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <a id="link_button-557-74" class="ct-link-button" href="{{ asset('storage/assets/org_constitution_bylaws/'.$org_applications[0]->org_constituon_bylaws)}}" target="_blank"> Constitution and Bylaws</a>
                    </div>
                    
                </div> <br>

                <div class="row d-flex float-right">
                <div class="form-group">
                    <a href="/admin-organization-application"> <button type="button" class="btn btn-info float-right"> BACK </button></a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approvedModal"> APPROVED</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#incompleteModal"> INCOMPLETE</button>
                
                <!-- Modal -->
                    <div class="modal fade" id="approvedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Prompt</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>This will approved the application and will send approval email to the applicant below: </label><br> <br>
                                <input type="text" class="form-control" readonly="readonly" id="customFile" name="applicationID" value="{{ $org_applications[0]->org_applicationID }}"> <br> 
                                <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_orgname" value="{{ $org_applications[0]->org_name }}"> <br> 
                                <input type="text" class="form-control" readonly="readonly" id="customFile" name="to" value="{{ $org_applications[0]->president_email }}"> <br> 
                                <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_lastname" value="{{ $org_applications[0]->president_lastname }}"> <br> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success float-right"> APPROVED </button> 
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>                  
                </form>
                <div class="modal fade" id="incompleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Confirmation Prompt </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                This will send an update to the applicant that the registration is incomplete. Kindly insert the reason below. <br> <br>
                                <div class="mb-3">
                                    <form method="post" action="{{route('send.email')}}">
                                        @csrf
                                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_date" value="{{ $org_applications[0]->created_at }}"> <br> 
                                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="applicationID" value="{{ $org_applications[0]->org_applicationID }}"> <br> 
                                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="to" value="{{ $org_applications[0]->president_email }}"> <br> 
                                        <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_lastname" value="{{ $org_applications[0]->president_lastname }}"> <br> 
                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" style="border:solid 2px gray;"></textarea>
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success float-right"> SEND </button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection