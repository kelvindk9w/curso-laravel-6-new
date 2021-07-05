<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function() {
    return 'Contato';
});

Route::get('/about', function() {
    return view('about/about');
});
