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
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="pull-left"><a href="{{ url('/') }}">Job board</a></h1>
            </div>
            <div class="col-md-6">
                <form class="navbar-form navbar-right" action="{{ url('/search') }}" method="GET" style="margin-top: 30px;">
                    <div class="form-group">
                        <input type="text" name="query" placeholder="Search for jobs" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
        <div class="col-md-12 text-center">
            @if(Request::is('job'))
                <a href="{{ url('job/create') }}" class="btn btn-md btn-primary pull-right" >Add a new job</a>
            @endif
        </div>
    </div>
</div>

<div class="container">
    @include('backend.partials.errors')
    @yield('content')
</div>
@include('scripts')
@yield('partialScript')
</body>
</html>
