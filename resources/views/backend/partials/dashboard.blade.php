@extends('layout')
@section('pageTitle', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive table-striped">
                <thead>
                <th>Email address</th>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->email }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ str_limit($job->description, 50, '...') }}</td>
                        <td>{{ $job->location }}</td>
                        <td><a href="/job/{{ $job->id  }}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection