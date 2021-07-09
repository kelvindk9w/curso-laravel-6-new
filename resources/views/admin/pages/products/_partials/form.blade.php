<bR><br>

@include('admin.alerts.alerts')

<br><br>

@csrf
<!--<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
<input type="file" class="form-control" name="image">
<br><br>
<input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $product->name ?? old('name') }}">
<br><br>
<input type="text" class="form-control" name="price" placeholder="Valor" value="{{ $product->price ?? old('price') }}">
<br><br>
<input type="text" class="form-control" name="description" placeholder="Descrição"  value="{{ $product->description ?? old('description') }}">
<br><br>
<button type="submit" class="btn btn-success btn-block">Enviar</button>
