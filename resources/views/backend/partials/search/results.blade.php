@extends('layout')
@section('pageTitle', 'Searching results for keyword:' . $keyword)
@section('partialStyle')
    {{ Html::style('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.css') }}
@endsection
@section('content')
    <div class="ui items">
    @foreach($searchResults as $result)
        <div class="item">
            <div class="content">
                <a class="header">{{ $result->title }}</a>
                    <div class="description">
                        <p>{{ $result->description }}</p>
                    </div>
                <div class="extra">
                    <i class="info icon"></i>
                    Created {{  \Carbon\Carbon::createFromTimeStamp(strtotime($result->created_at))->diffForHumans() }}
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
@section('partialScript')
    {{ Html::script('http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.min.js') }}
@endsection