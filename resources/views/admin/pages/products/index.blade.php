@extends('admin.layouts.app')

@section('title', 'Teste de produtos')

@section('content')

@include('admin.alerts.alerts')

<h1>View da index</h1>
<bR>
<h2>Exibindo produtos</h2>

<a href="{{ route( 'products.create' ) }}">
Cadastrar novo produto
</a>

@if(isset($products))

    @foreach($products as $product)

        <p class="@if($loop->last) last @endif">Produto: {{ $product }}</p>
        <hr>
    @endforeach

@endif

<br><bR><hr><br>

<h2>Exibindo produtos com forelse</h2>
@forelse($products as $product)
    <p class="@if($loop->last) last @endif">Produto: {{ $product }}</p>
    <hr>
@empty
    <p>Não existe produtos cadastrados</p>
@endforelse

<br><bR><hr><br>

@if($teste === 1234)
    Caiu no if
@elseif ($teste === '1234')
    Caiu no elseif
@else
    Caiu no else
@endif
<br><hr><br>
@unless($teste === '1234')
    Entrou no unless, que funciona como oposto do if (só entra se não atender o que é passado)
@endunless
<br><hr><br>
@isset($teste)
    Entrou, pq neste caso estou verificando se a variável existe
@endisset
<br><hr><br>
@empty($teste)
    Aqui eu verifico se a variável está vazio
@else
    Não está vazio
@endempty
<br><hr><br>
@auth
    Aqui eu verifico se a pessoa está autenticada
@else
    Não está autenticado
@endauth
<br><hr><br>
@guest
    Este caso eu verifico se a pessoa <strong>NÃO ESTÁ AUTENTICADA</strong>
@endguest
<br><hr><br>
@switch($teste)
    @case(1)
        Igual a 1
        @break

    @case(2)
        Igual a 2
        @break

    @case(123456)
        Igual a 123456
        @break

    @default
        Default
@endswitch

@endsection

<style>
    .last {
        background-color:blue;
        color: #fff;
    }
</style>
