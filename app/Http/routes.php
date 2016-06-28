<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return redirect(route('job.index'));
    });

    Route::resource('job', 'JobController');
    Route::get('/search', ['uses' => 'SearchController@findJob', 'as' => 'search']);
});
