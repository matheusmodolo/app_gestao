{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    <br/>
    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
    <br/>
    <input name="email" type="text" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    <br/>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contato') == $motivo->id ? 'selected' : '' }}>{{$motivo->motivo_contato}}</option>
        @endforeach
    </select>
    <br/>
    <textarea name="mensagem" class="{{ $classe }}">{{ old('mensagem')!= '' ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br/>
    <button type="submit" class="{{ $classe }}">Enviar</button>
</form>