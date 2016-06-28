<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('pageTitle') - Job board</title>
    @include('styles')
    @yield('partialStyle')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Job board</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" action="#" method="GET">
                <div class="form-group">
                    <input type="text" name="search" placeholder="Search for jobs" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1 class="pull-left"><a href="{{ url('/') }}">Job board</a></h1>
        @if(Request::is('/'))
            <a href="{{ url('job/create') }}" class="btn btn-md btn-primary pull-right" style="margin-top: 50px;">Add a new job</a>
        @endif
    </div>
</div>

<div class="container">
    @yield('content')
</div>
@include('scripts')
@yield('partialScript')
</body>
</html>
