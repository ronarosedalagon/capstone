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
Add Announcement 
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

                <form action="add" method="post" enctype="multipart/form-data">
                        
                @csrf
                        <label class="form-label" for="customFile">Announcement Poster</label>
                        <span style="color:red">@error('file'){{ $message }} @enderror</span>
                        <input type="file" class="form-control" id="customFile" name="file" value="{{ old('file') }}"> <br>   

                    <div class="row form-group ">
                        <div class="col">
                        <label>Announcement Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Announcement Title" value="{{ old('title') }}">
                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                        </div>

                        <div class="col">
                        <label>Event Date</label>
                        <input type="datetime-local" class="form-control" name="date" placeholder="Enter Event Date" value="{{ old('date') }}">
                        <span style="color:red">@error('date'){{ $message }} @enderror</span>
                        </div>

                        <div class="col">
                        <label>Event Venue</label>
                        <input type="text" class="form-control" name="venue" placeholder="Enter Event Venue" value="{{ old('venue') }}">
                        <span style="color:red">@error('venue'){{ $message }} @enderror</span>
                        </div>
                    </div>
                        
                        <div class="form-group">
                        <label>Announcement Details</label>
                        <textarea type="text" class="form-control" name="details" placeholder="Enter Short Description about the announcement" value="{{ old('details') }}"></textarea>
                        <span style="color:red">@error('details'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                        <label>Announcement Content</label>
                        <textarea  cols="30" rows="10"  class="form-control" name="content" placeholder="Enter Announcement Content" value="{{ old('content') }}"></textarea>
                        <span style="color:red">@error('content'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                        <label class="form-label" for="customFile">File Link (if applicable)</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter File Link" value="{{ old('link') }}">
                        <span style="color:red">@error('link'){{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            
                            <label>Target Audience</label> <br> 
                            <select class="form col-md-6 selectpicker" name="audience" value="{{ old('audience') }}">
                                <option selected disabled> Notifications Recipient: </option>
                                <option value="1">1st year</option>
                                <option value="2">2nd year</option>
                                <option value="3">3rd year</option>
                                <option value="4">4th year</option>
                                <option value="graduated">Graduated</option>
                                <option value="inactive"> Inactive Students </option>
                                <option value="active"> Active Students </option>
                                <option value="everyone"> Everyone</option>
                            </select>
                            <span style="color:red">@error('audience'){{ $message }} @enderror</span>
                        </div>
                    
                        <div class="form-group">
                            <a href="/admin-announcement/"> <button type="button" class="btn btn-danger float-right"> BACK </button></a>
                            <button type="submit" class="btn btn-info float-right"> POST </button> 
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection