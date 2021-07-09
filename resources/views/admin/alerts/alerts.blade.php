@if($errors->any())
    @foreach($errors->all() AS $error)
        <div class="alert alert-dark" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
