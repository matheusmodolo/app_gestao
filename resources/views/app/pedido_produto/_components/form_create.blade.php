<form method="POST" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf

    <select name="cliente_id">
        <option>Selecione</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" @if ((old('produto_id')) == $produto->id) selected @endif>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <button type="submit" class="borda-preta">Salvar</button>

</form>
