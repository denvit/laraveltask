@extends('layout')
@section('pageTitle', 'Searching results for keyword:' . $keyword)
@section('partialStyle')
    {{ Html::style('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.css') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($searchResults as $result)
                    <div class="col-md-4">
                        <div class="ui card">
                            <div class="image">
                                <img src="http://semantic-ui.com/images/wireframe/image-text.png">
                            </div>
                            <div class="content">
                                <a class="header">{{ $result->title }}</a>
                                <div class="meta">
                                    <span class="date">Created {{  \Carbon\Carbon::createFromTimeStamp(strtotime($result->created_at))->diffForHumans() }}</span>
                                </div>
                                <div class="description">
                                    {{ $result->description }}
                                </div>
                            </div>
                            <div class="extra content">
                                <a>
                                    <i class="marker icon"></i>
                                    {{ $result->location }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('partialScript')
    {{ Html::script('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.min.js') }}
@endsection