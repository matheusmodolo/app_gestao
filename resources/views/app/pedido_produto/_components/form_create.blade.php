<form method="POST" action="{{ route('pedido_produto.store', ['pedido' => $pedido]) }}">
    @csrf

    <select name="produto_id">
        <option>Selecione</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" @if ((old('produto_id')) == $produto->id) selected @endif>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" name="quantidade" placeholder="Quantidade" class="borda-preta"
        value="{{ old('quantidade') }}">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="borda-preta">Salvar</button>

</form>
