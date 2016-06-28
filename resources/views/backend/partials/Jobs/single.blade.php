@extends('layout')
@section('pageTitle', $job->title)
@section('partialStyle')
    {{ Html::style('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.css') }}
@endsection
@section('content')
    <div class="ui items">
        <div class="item">
            <div class="image">
                <img src="http://semantic-ui.com/images/wireframe/image.png">
            </div>
            <div class="content">
                <a class="header">{{ $job->title }}</a>
                <div class="meta">
                    <span>{{ $job->email }}</span>
                </div>
                <div class="extra">
                    {{ $job->location }}
                </div>
                <div class="description">
                    <p>{{ $job->description }}</p>
                </div>
                <div class="extra">
                    <div class="ui label">PHP</div>
                    <div class="ui label">MySQL</div>
                    <div class="ui label">Amazon Web Services</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('partialScript')
    {{ Html::script('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.min.js') }}
@endsection