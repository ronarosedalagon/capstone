<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.manage')


@section('manage-subtitle')
Publication - Manage Data
@endsection

<!-- start of manage table -->
@section('manage-content')
<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>DATE</th>
        <th>CREATED</th>
        <th>UPDATED</th>
        <th>ACTION</th>
    </thead>
    <tbody>
    @foreach ($list as $item)
        <tr>
            <td>{{ $item->publication_id }}</td>
            <td>{{ $item->publication_title}}</td>
            <td>{{ $item->publication_date}}</td>
            <td>{{ $item->created_at}}</td>
            <td>{{ $item->updated_at}}</td>
            <td>
                <div class="d-flex flex-row">
                    <a href="/click_update_pub/{{ $item->publication_id }}"> <button type="button" class="btn btn-info"> UPDATE </button></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection