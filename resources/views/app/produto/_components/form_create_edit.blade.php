@if (isset($produto->id))
    <form method="POST" action="{{ route('produto.update', $produto->id) }}') }}">
        @csrf
        @method('PUT')
    @else
        <form method="POST" action="{{ route('produto.store') }}">
            @csrf
@endif

<select name="fornecedor_id">
    <option>Selecione um Fornecedor</option>
    @foreach ($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}" @if (($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id) selected @endif>
            {{ $fornecedor->nome }}</option>
    @endforeach
</select>

<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<input type="text" name="descricao" placeholder="Descrição" class="borda-preta"
    value="{{ $produto->descricao ?? old('descricao') }}">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<input type="text" name="peso" placeholder="Peso" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<select name="unidade_id">
    <option>Selecione</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" @if (($produto->unidade_id ?? old('unidade_id')) == $unidade->id) selected @endif>
            {{ $unidade->descricao }} ({{ $unidade->unidade }})</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Salvar</button>

</form>
