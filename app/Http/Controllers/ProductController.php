<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product) {
        $this->request = $request;
        $this->repository = $product;
        //Neste caso estou falando que para aplicar este middleware em todas as classes
        //$this->middleware('auth');

        //Neste caso estou falando que deve aplicar este middleware apenas na classe especificado abaixo
        //$this->middleware('auth')->only('create');

        //Neste caso estou falando que deve aplicar este middleware em todas as classes, excetos as informadas
        //$this->middleware('auth')->except('index');
    }

    public function index()
    {

        $products = Product::paginate(20);

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    public function show($id) {

        //$product = Product::where('id', $id)->first();
        //$product = Product::find($id);

        if(!$product = $this->repository->where('id', $id)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    public function create() {
        return view('admin.pages.products.create');
    }

    public function edit($id) {

        if(!$product = $this->repository->where('id', $id)->first())
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
    }

    public function store(StoreUpdateProductRequest $request) {

        $data = $request->only('name', 'description', 'price');

        if($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');


        //$product = new Product;
        //$product->name = $request->name;
        //$product->save();



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

    public function update(StoreUpdateProductRequest $request, $id) {
        if(!$product = $this->repository->where('id', $id)->first())
            return redirect()->back();

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid()) {

            if($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy($id) {

        $product = $this->repository->where('id', $id)->first();

        if(!$product)
            return redirect()->back();

        if($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

        $product->delete();

        return redirect()->route('products.index');

    }

    public function search(Request $request) {

        $filters = $request->all();

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }
}
