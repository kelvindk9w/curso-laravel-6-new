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

//In this case it is a simple route with parameter access, so the name need not be the same as the name defined in the route.
Route::get('/users/{id_user}', function ($id_user) {
    return "O ID do usuário é: {$id_user}";
});

//In this case it is an access route with more details in the path, so the variable name has to be the same as the one in the past in the path
Route::get('/users/{id_user}/posts', function($id_user){
    return "Vamos ver todos os posts do usuário: {$id_user}";
});

//this type of route can be passed the parameter or not that it will work
Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produtos {$idProduct}";
});
