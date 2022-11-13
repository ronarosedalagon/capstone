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
Update Announcement
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

                <form action="/update/{{ $announcement[0]->announcement_id }}" method="post">
                            
                @csrf
                     
                    <div class="row form-group ">

                        <div class="col">
                        <label>Announcement Title</label>
                        <input type="text" class="form-control" name="announcement_title"  value="{{ $announcement[0]->announcement_title }}">
                        <span style="color:red">@error('title'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                        <label>Announcement Details</label>
                        <input type="text" class="form-control" name="announcement_details"  value="{{ $announcement[0]->announcement_details }}">
                        <span style="color:red">@error('details'){{ $message }} @enderror</span>
                        </div>


                        <div class="form-group">
                        <label>Announcement Content</label>
                        <textarea  cols="30" rows="10"  class="form-control" name="announcement_content" > <?php echo $announcement[0]->announcement_content?> </textarea>
                        <span style="color:red">@error('content'){{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                        <label class="form-label" for="customFile">File Link (if applicable)</label>
                        <input type="text" class="form-control" name="announcement_link"  value="{{ $announcement[0]->announcement_link }}">
                        <span style="color:red">@error('link'){{ $message }} @enderror</span>
                        </div>

                        <div class="col">
                        <label>Event Venue</label>
                        <input type="text" class="form-control" name="announcement_eventvenue"  value="{{ $announcement[0]->announcement_eventvenue }}">
                        <span style="color:red">@error('venue'){{ $message }} @enderror</span>
                        </div>

                    </div>
                        
                
                    
                        <div class="form-group">
                            <a href="/admin-announcement"> <button type="button" class="btn btn-danger float-right"> BACK </button></a>
                            <button type="submit" class="btn btn-info float-right"> UPDATE </button> 
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection