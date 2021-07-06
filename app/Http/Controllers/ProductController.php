<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;

    public function __construct(Request $request) {
        //Neste caso estou falando que para aplicar este middleware em todas as classes
        //$this->middleware('auth');

        //Neste caso estou falando que deve aplicar este middleware apenas na classe especificado abaixo
        //$this->middleware('auth')->only('create');

        //Neste caso estou falando que deve aplicar este middleware em todas as classes, excetos as informadas
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {
        $products = ['Celular', 'Câmera', 'Computador'];
        return $products;
    }

    public function show($id) {
        return "Estamos vendo os detalhes do produto: {$id}";
    }

    public function create() {
        return 'Vamos criar um novo produto';
    }

    public function edit($id) {
        return "Vamos editar o produto: {$id}";
    }

    public function store() {
        return "Cadastrando um novo produto";
    }

    public function update($id) {
        return "Editando o produto: {$id}";
    }

    public function destroy($id) {
        return "Deletando o produto: {$id}";
    }
}
