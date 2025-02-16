@if (isset($produto_detalhe->id))
    <form method="POST" action="{{ route('produto-detalhe.update', $produto_detalhe->id) }}') }}">
    @csrf
    @method('PUT')
@else
    <form method="POST" action="{{ route('produto-detalhe.store') }}">
    @csrf
@endif

        <input type="text" name="produto_id" placeholder="ID Produto" class="borda-preta"
            value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="text" name="comprimento" placeholder="Comprimento" class="borda-preta"
            value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

        <input type="text" name="largura" placeholder="Largura" class="borda-preta"
            value="{{ $produto_detalhe->largura ?? old('largura') }}">
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}
        
        <input type="text" name="altura" placeholder="Altura" class="borda-preta"
            value="{{ $produto_detalhe->altura ?? old('altura') }}">
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}


        <select name="unidade_id">
            <option>Selecione</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" @if (($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id) selected @endif>
                    {{ $unidade->descricao }} ({{ $unidade->unidade }})</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        <button type="submit" class="borda-preta">Salvar</button>

    </form>
