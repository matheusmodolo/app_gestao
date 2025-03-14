@if (isset($pedido->id))
    <form method="POST" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="POST" action="{{ route('pedido.store') }}">
            @csrf
@endif

<select name="cliente_id">
    <option>Selecione</option>
    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" @if (($pedido->cliente_id ?? old('cliente_id')) == $cliente->id) selected @endif>
            {{ $cliente->nome }}</option>
    @endforeach
</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

<button type="submit" class="borda-preta">Salvar</button>

</form>
