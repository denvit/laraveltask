@extends('layout')
@section('pageTitle', 'Add a new job')
@section('content')
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('job.store') }}" method="POST">
            <div class="col-md-6">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="EmailAddress">Email address</label>
                        <input tabindex="1" type="email" placeholder="Email address" name="email" class="form-control" value="{{ Input::old('emailAddress') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea tabindex="3" placeholder="Description" name="description" class="form-control">{{ Input::old('description') }}</textarea>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input tabindex="2" type="text" placeholder="Title" name="title" class="form-control" value="{{ Input::old('title') }}">
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <input tabindex="4" type="text" placeholder="Skills" name="skills" class="form-control" value="{{ Input::old('skills') }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Remote</label><br>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remote" value="remote">Remote </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Specific location</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter your location">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button class="btn btn-lg btn-primary">Save it</button>
            </div>
        </form>
    </div>
@endsection