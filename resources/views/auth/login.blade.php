<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../assets/img/school_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\login.css'; ?>
</style>

<body>
<div class="body">
    <!-- start of front end code -->
    <img src="assets/img/header.png" id="header">

    <div class="row container-fluid">
    </div>
    <img src="assets/img/our_team.png" alt="Our Team" class="our_team_photo" id="our_team_photo">
    <img src="assets/img/school_logo.png" alt="School Logo" class="school_logo" id="school_logo">
    <!-- end of front end code -->
    <div class="container login-box-body">
        <div class="row col-md-5 offset-md-3 login-box-outer justify-content-md-center">
            <div class="col-md-9 login-container">
                <h6>User Authentication</h6>
                <hr>
                <form action="{{route('login-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-fail">{{Session::get('fail')}}</div>
                    @endif
                    
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">Student ID</label>
                        <input type="text" class="form-control" placeholder="Enter Student ID" name="student_id" value="{{old('student_id')}}">
                        <span class="text-danger">@error('student_id') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div> <br>
                    <div class="form-group">
                       <button class="btn btn-block btn-primary btn-sm" type="submit" style="float:right;"> Login </button>
                       <button class="btn btn-block btn-primary btn-sm" type="button"> <a href="registration" id="register-btn"> Register </a></button>
                    </div>
                    <div class="form-group">
                    <span> <h5> Forgot your Password? <a href="">Click Here</a> </h5>
                    </div>
                </form>
            </div>
        </div>   
    </div>

</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 