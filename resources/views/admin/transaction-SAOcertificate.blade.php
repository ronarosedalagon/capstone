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
    <div class="col-md-12" st>
    <div class="card">
        <div class="card-header col-md-12 text-right">
            
            <!-- action buttons -->
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Request</a>
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Pending</a>
            <a href="" class="btn btn-secondary btn-md" role="button" aria-pressed="true">Incomplete</a>
            </div>

        </div>
        
            <div class="card-body" style="margin-top:-2%;">
            <h4 class="card-title text-center">SAO CERTIFICATE</h4>
              
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

            @if(Session::has('fail'))
            <div class="alert alert-fail" style="background-color:red">{{Session::get('fail')}}</div>
            @endif

            
                @if(isset($studentsdata))
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Receipt</th>
                            <th>Requested at</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody> 
                        @foreach ($studentsdata as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->student_id }}</td>
                                <td>{{ $item->student_name}}</td>
                                <td>{{ $item->student_email}}</td>
                                <td> <button type="submit" id="verifyButton" data-toggle="modal" data-target="#receiptModal" class="btn btn-warning btn-sm button"> {{ $item->payment_receipt}} </button></td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ $item->status}}</td>
                                
                                <td>
                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-md btn-success"> CONFIRM </button>
                                </td>    

                                    
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enrolment Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Student ID: <span style="color:gray">{{ $item->student_id }}</span></h6>
                <h6>Student Name: <span style="color:gray">{{ $item->student_name}}</span></h6>

                <img width=" 500" height="140" src="{{ asset('storage/assets/sao_cert_receipt/'.$item->payment_receipt) }}" class="thumbnail wp-post-image img-fluid" alt="" loading="lazy" 
                srcset="{{ asset('storage/assets/sao_cert_receipt/'.$item->payment_receipt) }}"sizes="(max-width: 150px) 100vw, 150px">		
                
            </div>
        
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation Prompt</h5>
            <hr>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="GET" action="/approved-request-status/{{$item->student_id}}/{{ $item->status}}">
          
        <div class="modal-body">
            <p>Are you sure that the student is qualified for SAO Certificate issuance? </p>


            <label>This will generate a SAO certificate and will send approval email to the applicant below: </label><br>
            <h6>Student Email</h6>
            <input type="text" class="form-control" readonly="readonly" id="customFile" name="to" value="{{ $item->student_email}}"> <br> 
            
            <h6>Student Name</h6>
            <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_name" value="{{ $item->student_name}}"> <br> 

            <h6>Request Date and Time</h6>
            <input type="text" class="form-control" readonly="readonly" id="customFile" name="to_date" value="{{ $item->created_at}}"> <br> 

            
            <label> Click <b>CONFIRM BUTTON</b> to proceed. </label> <br>

            <button type="submit" class="btn btn-success btn-sm button float-right"> CONFIRM </button>
        </form>

            <form method="GET" action="/export-certificate/{{$item->student_name}}">
            <button type="submit" class="btn btn-warning btn-sm button float-right"> GENERATE CERTIFICATE </button>
            </form>

        </div>
        
    
        </div>
        </div>
    </div>
</div>



@section('scripts')

@endsection