@extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content')

    <div class="row text-center">
        <div class="col-md-6">
            <h1>Editar produto - {{ $product->id }}</h1>
        </div>
        <div class="col-md-6">
            <a href="{{ route('products.index')}}" class="btn btn-danger">Voltar</a>
        </div>
    </div>

    <br><br><br>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.products._partials.form')
    </form>

@endsection
