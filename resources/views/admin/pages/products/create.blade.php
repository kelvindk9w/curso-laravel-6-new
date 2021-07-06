@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')

    <h1>Cadastrar novo produto</h1>

    @if($errors->any())
        @foreach($errors->all() AS $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <input type="file" name="photo">
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
        <input type="text" name="description" placeholder="Descrição"  value="{{ old('description') }}">
        <button type="submit">Enviar</button>
    </form>

@endsection
