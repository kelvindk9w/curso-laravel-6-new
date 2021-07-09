@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')

    <div class="row text-center">
        <div class="col-md-6">
            <h1>Cadastrar novo produto</h1>
        </div>
        <div class="col-md-6">
            <a href="{{ route('products.index')}}" class="btn btn-danger">Voltar</a>
        </div>
    </div>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.pages.products._partials.form')
    </form>

@endsection
