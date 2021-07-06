<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductRequest;

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
        $teste = 123456;
        $teste2 = [1,2,3,4,5];
        $products = ['Celular', 'Computador', 'Tv', 'Câmera'];

        return view('admin.pages.products.index', compact('teste', 'teste2', 'products'));
    }

    public function show($id) {
        return "Estamos vendo os detalhes do produto: {$id}";
    }

    public function create() {
        return view('admin.pages.products.create');
    }

    public function edit($id) {
        return view('admin.pages.products.edit', compact('id'));
    }

    public function store(StoreUpdateProductRequest $request) {

        dd('ok');

        //pego todas requisições
        //dd($request->all());

        //pego requisições especificas
        //dd($request->only(['name', 'description']));

        //neste caso estou pegando o valor direto do input
        //dd($request->name);

        //neste caso estou verificando se existe este valor
        //dd($request->has('name'));

        //neste caso eu defino um valor default para o input
        //dd($request->input('name', 'test2'));

        //neste caso eu estou pegando todos os campos exceto o que eu informei
        //dd($request->except('_token'));

        //aqui pego os dados do envio de arquivo
//        dd($request->file('photo')->isValid());

        /*
        Aqui estou fazendo o upload de arquivos
        if($request->file('photo')->isValid() == true) {
            $request->photo->store('products');
        }*/
    }

    public function update($id) {
        dd($_POST);
    }

    public function destroy($id) {
        return "Deletando o produto: {$id}";
    }
}
