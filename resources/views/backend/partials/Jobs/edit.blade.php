@extends('layout')
@section('pageTitle', 'Editing a job with title: ' . $job->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="col-sm-12">Update job: {{ $job->title }}</h3>
                    </div>
                </div>
                {!! Form::model($job, ['method' => 'PUT', 'route' => ['job.update', $job->id] ]) !!}
                <input type="hidden" name="jobId" value="{{ $job->id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                            {!! Form::label('email', 'Email address') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('title', 'Job title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pull-left">
                    <div class="form-group col-sm-6 ">
                        <button class="btn btn-md btn-primary" type="submit">
                            <strong>Update job</strong>
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                {{ Form::open(['route' => ['job.destroy', $job->id], 'method' => 'delete']) }}
                    {{ csrf_field() }}
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-md btn-danger pull-right">
                                <strong>Remove job</strong>
                            </button>
                        </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection