<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css">
</head>
<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.manage')

<!-- start of side-bar links -->
@section('manage-subtitle')
Update Scholarship
@endsection

@section('manage-content')
    <div class="container">
        <div class="row">
            
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

                <form action="/update_schl/{{ $scholarship[0]->scholarship_id }}" method="post" enctype="multipart/form-data">
                        
                @csrf
                        <label class="form-label" for="customFile">Scholarship Content Photo</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="file" class="form-control" id="customFile" name="scholarship_photo" value="{{ $scholarship[0]->scholarship_photo }}"> <br>   

                        <label class="form-label" for="customFile">Scholarship PDF File</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="file" class="form-control" id="customFile" name="scholarship_file" value="{{ $scholarship[0]->scholarship_file }}"> <br>   

                    <div class="row form-group ">
                        <div class="col">
                        <label>Scholarship Name</label>
                        <input type="text" class="form-control" name="scholarship_name"  value="{{ $scholarship[0]->scholarship_name }}">
                        <span style="color:red">@error('name'){{ $message }} @enderror</span>
                        </div>

                    </div>
                    
                    
                        <div class="form-group">
                            <a href="/admin-scholarship/manage"> <button type="button" class="btn btn-danger float-right"> BACK </button></a>
                            <button type="submit" class="btn btn-info float-right"> POST </button> 
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

