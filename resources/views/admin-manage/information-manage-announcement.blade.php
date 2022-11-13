<style>
<?php include 'C:\xampp\htdocs\saisproj\resources\css\main.css'; ?>
</style>

@extends('layouts.manage')


@section('manage-subtitle')
Announcement - Manage Data
@endsection

<!-- start of manage table -->
@section('manage-content')
<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>CREATED</th>
        <th>UPDATED</th>
        <th>ACTION</th>
    </thead>
    <tbody>
    @foreach ($list as $item)
        <tr>
            <td>{{ $item->announcement_id }}</td>
            <td>{{ $item->announcement_title}}</td>
            <td>{{ $item->createdat}}</td>
            <td>{{ $item->updatedat}}</td>
            <td>
                <div class="d-flex flex-row">
                    <a href="/click_update/{{ $item->announcement_id }}"> <button type="button" class="btn btn-info"> UPDATE </button></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection