<?php

use Illuminate\Support\Facades\Route;

//As rotas abaixo foram criadas no módulo dos controllers

//O resource esta fazendo a mesma coisa que as rotas abaixo de products, porém em uma estrutura menor
Route::resource('products', 'App\Http\Controllers\ProductController');

/*
Route::get('products/edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::get('products/create', 'App\Http\Controllers\ProductController@create')->name('products.create');
Route::get('products/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('list.products');
Route::get('/admin/teste', 'App\Http\Controllers\Admin\TesteController@teste')->name('admin.teste');
Route::post('products', 'App\Http\Controllers\ProductController@store')->name('products.store');
Route::put('products/{id}', 'App\Http\Controllers\ProductController@update')->name('products.update');
Route::delete('products/{id}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
*/

//As rotas abaixo foram criadas no módulo de rotas

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

//With this type of route, I can use the redirect() helper and when I access, send it to wherever I want
Route::get('redirect', function(){
    return redirect('/contato');
});

//With this type of route, I can use the redirect() helper and when I access, send it to wherever I want
Route::redirect('/redirect2', '/about');

//This type of route I directly access the view I want (could be used on static pages)
Route::view('/testeabout', 'welcome');

//Here I define the name of the route, so when I need to access it, I call it by name and if in the future I need to change the url, I don't need to refactor the code, as the system will automatically identify it by name (imagine as if ->name was the creation of a variable and the path was its value)
Route::get('/name-url', function(){
    return 'name route';
})->name('url.name');

Route::get('/login', function(){
    return 'login';
})->name('login');

//Here I'm creating a route group that is using a middleware, where it defines that to access this page you need to be logged in and the 2nd group is informing that it will be inside "/admin" for example
/*Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){

        //In this case I'm defining that the controller I want is inside a folder in the Controller, but with the group I don't need to define the path in each controller, so it's done automatically in all
        Route::namespace('App\Http\Controllers\Admin')->group(function(){

            //in this case I'm defining a part of the name of each controller, since the start will be the same in all, so I create the name group to define this start
            Route::name('admin.')->group(function(){
                Route::get('/teste', 'TesteController@teste')->name('teste');

                Route::get('/products', 'TesteController@products')->name('products');
            });

            //Route::get('/teste', 'TesteController@teste')->name('admin.teste');

            //Route::get('/products', 'TesteController@products')->name('admin.products');
        });

        Route::get('/dashboard', function(){
            return 'dashboard';
        });

        Route::get('/financeiro', function(){
            return 'Financeiro';
        });

        Route::get('/settings', function(){
            return 'settings';
        });

    });
}); */

//This format is the same thing I did above, but in a simpler and easier way
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'Admin',
    'namespace' => 'App\Http\Controllers\Admin'
], function(){

    Route::get('/teste', 'TesteController@teste')->name('teste');

    Route::get('/products', 'TesteController@products')->name('products');

});

/*
* in the terminal there are 2 commands about the routes
* 1st - php artisan route:list (this command is to list all your routes and your requests)
* 2nd - php artisan route:cache (serves to clear the routes cache)
*/
