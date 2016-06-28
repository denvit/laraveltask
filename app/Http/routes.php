<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return redirect('/job');
    });

    Route::resource('job', 'JobController');
});
