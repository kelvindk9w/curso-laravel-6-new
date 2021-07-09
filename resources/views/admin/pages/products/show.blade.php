@extends('admin.layouts.app')

@section('title', 'Teste de produtos')

@section('content')

@include('admin.alerts.alerts')

<div class="row text-center">
    <div class="col-md-6">
        <h1 class="text-center">Produto {{ $product->name }}</h1>
    </div>

    <div class="col-md-6">
        <a href="{{ route('products.index') }}" class="btn btn-danger">Voltar</a>
    </div>
</div>

<bR><br>

<strong>Nome: {{ $product->name }}</strong>
<br><br>
<strong>Preço: {{ $product->price }}</strong>
<br><br>
<strong>Descrição: {{ $product->description }}</strong>

<br><br><br><br>

<div class="row text-center">

    <div class="col-md-6">

        <form action="{{ route('products.destroy', $product->id)}}" method="post">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-block">
                Deletar o produto: {{ $product->name }}
            </button>

        </form>

    </div>

    <div class="col-md-6">
        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-warning">
            Editar
        </a>
    </div>
</div>

@endsection
