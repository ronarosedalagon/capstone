
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../assets/img/school_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
</head>
<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\login.css'; ?>
</style>

<body>
    <!-- start of front end code -->
    <img src="assets/img/header.png" id="header">

    <div class="row container-fluid">
    </div>
    <img src="assets/img/school_logo.png" alt="School Logo" id="school_logo">
    <!-- end of front end code -->
    <div class="container login-box-body">
        <div class="row col-md-10 offset-md-1 login-box-outer justify-content-md-center">
            <div class="col-md-12 login-container">
                <!-- form here -->
                <div class="container">
                <h6>Account Registration</h6>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-fail">{{Session::get('fail')}}</div>
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col registration-field">
                            <label for="name">Student ID</label>
                            <input type="text" class="form-control" placeholder="Enter Student ID" name="student_id" value="{{old('student_id')}}" style="text-transform:uppercase">
                            <span class="text-danger">@error('student_id') {{$message}} @enderror</span>
                        </div>
                        <div class="col registration-field">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col registration-field">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="{{old('last_name')}}" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
                            <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                        </div>
                        <div class="col registration-field">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="{{old('first_name')}}" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
                            <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                        </div>
                        <div class="col registration-field">
                            <label for="name">Middle Name</label>
                            <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name" value="{{old('middle_name')}}" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
                            <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col registration-field">
                            <div>
                            <label for="name">Department</label>
                                <select class="form-control" placeholder="Select Category"
                                    id="sub_category_name" name = 'department'>
                                    <option value="0" name = 'department' disabled selected>Select
                                        Department</option>
                                    @foreach ($data as $department)
                                    <option value="{{ $department->dept_id }}">
                                        {{ ucfirst($department->dept_name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col registration-field">
                            <label for="name">Course</label>
                            <select class="form-control " placeholder="Select Courses" id="course" name ='course'>
                            </select>
                        </div>




                        <div class="col registration-field">
                            
                            <label>Year</label> <br> 
                            <select class="form-control" name="year" value="{{ old('year') }}">
                                <option disabled="true" selected="true"> Year Level </option>
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
                            </select>
                            <span style="color:red">@error('audience'){{ $message }} @enderror</span>
                        </div>


                        <div class="col registration-field">
                            <label for="name">Birth Date</label>
                            <input type="date" class="form-control" name="birth_date" min='1950-01-01' max='2017-01-01' value="{{old('birth_date')}}">
                            <span class="text-danger">@error('birth_date') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                       <button class="btn btn-block btn-primary" type="submit"> Register </button>
                    </div><br>

                    <span> <h5> Already have an account? <a href="login">Login Here</a> </h5>
                </form>
                </div>
            </div>
            </div>
        </div>   
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
                $(document).ready(function () {
                $('#sub_category_name').on('change', function () {
                let id = $(this).val();
                $('#course').empty();
                $('#course').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'GetSubCatAgainstMainCatEdit/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#course').empty();
                $('#course').append(`<option value="0" disabled selected>Select Course</option>`);
                response.forEach(element => {
                    $('#course').append(`<option value="${element['course_name']}">${element['course_name']}</option>`);
                    });
                }
            });
        });
    });


    var dateControler = {
                currentDate : null
            }

             $(document).on( "change", "#txtDate",function( event, ui ) {
                    var now = new Date();
                    var selectedDate = new Date($(this).val());

                    if(selectedDate > now) {
                        $(this).val(dateControler.currentDate)
                    } else {
                        dateControler.currentDate = $(this).val();
                    }
                });   


</script>