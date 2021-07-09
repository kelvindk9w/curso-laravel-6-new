@extends('admin.layouts.app')

@section('title', 'Teste de produtos')

@section('content')

@include('admin.alerts.alerts')

<h1 class="text-center">View da index</h1>
<bR><br>

<div class="row text-center">
    <div class="col-md-6">
        <h2>Exibindo produtos</h2>
    </div>

    <div class="col-md-6">
        <a href="{{ route( 'products.create' ) }}" class="btn btn-info">
        Cadastrar novo produto
        </a>
    </div>
</div>

<br><hr><br>

    <form action="{{ route('products.search') }}" method="post">
        @csrf
        <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value=" {{ $filters->filter ?? '' }}">
        <button type="submit" class="btn btn-success">Pesquisar</button>
    </form>

<br><hr><br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" width="100">
                        @endif

                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price}}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                            Detalhes
                        </a>
                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-warning">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    @if (isset($filters))
        <div class="text-center">
            {!! $products->appends($filters)->links() !!}
        </div>
    @else
        <div class="text-center">
            {!! $products->links() !!}
        </div>
    @endif

@endsection
