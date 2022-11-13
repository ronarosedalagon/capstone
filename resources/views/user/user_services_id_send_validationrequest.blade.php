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

    <div style="margin-top:3%;padding-bottom:20px;">
        <h4>SEND - ENROLMENT VALIDATION</h4>
        <hr>

        <div class="modal-body">

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

            <div class="col-sm" id="user_ID">
                    
                <form method="post" action="/update_validation/{student_id}">
                    @csrf

                    <h5>Student Details</h5>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">First Name</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_firstname" value="{{ $users[0]->first_name }}"> <br>
                        </div>
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">Middle Name</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_middlename" value="{{ $users[0]->middle_name }}"> <br>
                        </div>
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">Last Name</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_lastname" value="{{ $users[0]->last_name }}"> <br>  
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">Student ID</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_id" value="{{ $users[0]->student_id }}"> <br>
                        </div>
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">Course</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_course" value="{{ $users[0]->course }}"> <br>
                        </div>
                        <div class="col-md-4 col-md-offset-3">
                            <label class="form-label" for="customFile">Previous Year Enrolled</label>
                            <span style="color:red">@error('file'){{ $message }} @enderror</span>
                            <input type="text" class="form-control" readonly="readonly" id="customFile" name="stud_prev_yearlevel" value="{{ $users[0]->year_level }}"> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            
                        <label class="form-label" for="customFile">Update Enrolment: </label> <br>
                            <select class="form col-md-6 selectpicker" name="stud_yearlevel" value="{{ old('stud_yearlevel') }}">
                                <option selected disabled> Present Year Enrolled: </option>
                                <option value="1st year, 1st semester">1st year, 1st semester</option>
                                <option value="1st year, 2nd semester">1st year, 2nd semester</option>
                                <option value="2nd year, 1st semester">2nd year, 1st semester</option>
                                <option value="2nd year, 2nd semester">2nd year, 2nd semester</option>
                                <option value="3rd year, 1st semester">3rd year, 1st semester</option>
                                <option value="3rd year, 2nd semester">3rd year, 2nd semester</option>
                                <option value="3rd year, Summer">3rd year, Summer</option>
                                <option value="4th year, 1st semester">4th year, 1st semester</option>
                                <option value="4th year, 2nd semester4">4th year, 2nd semester</option>
                                <option value="4th year, Summer">4th year, Summer</option>
                                <option value="graduated">Graduated</option>

                            </select>
                            <br><span style="color:red">@error('stud_yearlevel'){{ $message }} @enderror</span>
                        </div>
                        </div>

                        <div class="col-md-3 col-md-offset-3">
                        <label class="form-label" for="customFile">Upload your enrolment receipt</label>
                        <input type="file" class="form-control" id="customFile" name="stud_receipt" value="{{ old('stud_receipt') }}">  
                        <span style="color:red">@error('stud_receipt'){{ $message }} @enderror</span>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-success float-right"> SEND </button>
                </form>
                    
            </div> 
        </div>


    </div>

    
    
    @endsection
    
    
    @section('scripts')
    <script></script>
    @endsection