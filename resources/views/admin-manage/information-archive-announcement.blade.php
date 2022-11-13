 <style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.manage')


@section('manage-subtitle')
Archive Announcement
@endsection

<!-- start of manage table -->
@section('manage-content')
<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>EVENT DATE</th>
        <th>VENUE</th>
        <th>AUDIENCE</th>
        <th>ACTION</th>
    </thead>
    <tbody>
    @foreach ($list as $item)
        <tr>
            <td>{{ $item->announcement_id }}</td>
            <td>{{ $item->announcement_title}}</td>
            <td>{{ $item->announcement_eventdate}}</td>
            <td>{{ $item->announcement_eventvenue}}</td>
            <td>{{ $item->announcement_audience}}</td>
            <td>
                <div class="d-flex flex-row">
                    <!-- <a href=""> <button type="button" class="btn btn-warning"> ARCHIVE </button></a> -->
                    <input data-id="{{$item->announcement_id}}" class="toggle-class" type="checkbox"
                    data-onstyle="danger"
                        data-offstyle="success" data-toggle="toggle" data-on="Un-Archive" data-off="Archive"
                        {{$item->announcement_status ? 'checked' : ''}}>
                
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection

@push('scripts')

<script>

$(function(){

    $('.toggle-class').change(function(){
        var announcement_status = $(this).prop('checked') == true ? 1 : 0 ;
        var announcement_id = $(this).data('id');
        $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route ('archives')}}',
                    data: {
                        'announcement_status': announcement_status, 
                        'announcement_id': announcement_id
                    },
                    success: function(data){
                        console.log('Success')
                    }

                });
    });
});


</script>


@endpush