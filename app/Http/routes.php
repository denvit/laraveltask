<?php

Route::get('/', function () {
    return view('backend.partials.dashboard');
});

Route::resource('job', 'JobController');
