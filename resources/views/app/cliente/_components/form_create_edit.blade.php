@if (isset($cliente->id))
    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}') }}">
        @csrf
        @method('PUT')
    @else
        <form method="POST" action="{{ route('cliente.store') }}">
            @csrf
@endif

<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<button type="submit" class="borda-preta">Salvar</button>

</form>
