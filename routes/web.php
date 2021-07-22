<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function(){
    return view('upload-file');
});

Route::post('/upload', function(){
    if (request()->has('mycsv')) {
        return 'yes file is there';
    }

    return 'Please upload file';
});