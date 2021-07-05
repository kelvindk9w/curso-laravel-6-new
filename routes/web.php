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


//Any routes allow any type of request
Route::any('/any', function() {
    return 'Any';
});

//match routes i decide which request types will be allowed
Route::match(['get', 'post'], '/match', function () {
    return 'match';
});
