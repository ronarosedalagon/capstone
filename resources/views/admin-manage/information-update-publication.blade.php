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
Update Publication
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

                <form action="/update_pub/{{ $publication[0]->publication_id }}" method="post" enctype="multipart/form-data">
                        
                @csrf
                        <label class="form-label" for="customFile">Publication Content Photo</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="file" class="form-control" id="customFile" name="publication_photo" value="{{ $publication[0]->publication_photo }}"> <br>   

                        <label class="form-label" for="customFile">Publication PDF</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="file" class="form-control" id="customFile" name="publication_file" value="{{ $publication[0]->publication_file }}"> <br>   

                    <div class="row form-group ">
                        <div class="col">
                        <label>Publication Title</label>
                        <input type="text" class="form-control" name="publication_title" placeholder="Enter Announcement Title" value="{{ $publication[0]->publication_title }}">
                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                        </div>

                        <div class="col">
                        <label>Date Published</label>
                        <input type="datetime-local" class="form-control" name="publication_date" placeholder="Enter Event Date" value="{{ $publication[0]->publication_date }}">
                        <span style="color:red">@error('date'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    
                    
                        <div class="form-group">
                            <a href="/admin-publication/manage"> <button type="button" class="btn btn-danger float-right"> BACK </button></a>
                            <button type="submit" class="btn btn-info float-right"> POST </button> 
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

