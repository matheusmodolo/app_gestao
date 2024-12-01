{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    @if ($errors->has('nome'))
    <div style="color: red; font-size: .9rem;">{{ $errors->first('nome') }}</div>
    @endif

    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}" 
        style="margin-top: 1rem;"> 
    @if ($errors->has('telefone'))
    <div style="color: red; font-size: .9rem;">{{ $errors->first('telefone') }}</div>
    @endif
    
    <input name="email" type="email" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}" 
        style="margin-top: 1rem;">
    @if ($errors->has('email'))
    <div style="color: red; font-size: .9rem;">{{ $errors->first('email') }}</div>
    @endif
    
    <select name="motivo_contatos_id" class="{{ $classe }}" style="margin-top: 1rem;">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}>{{$motivo->motivo_contato}}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
    <div style="color: red; font-size: .9rem;">{{ $errors->first('motivo_contatos_id') }}</div>
    @endif
    
    <textarea name="mensagem" class="{{ $classe }}" style="margin-top: 1rem;"
        >{{ old('mensagem')!= '' ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    @if ($errors->has('mensagem'))
    <div style="color: red; font-size: .9rem;">{{ $errors->first('mensagem') }}</div>
    @endif
    
    <button type="submit" class="{{ $classe }}" style="margin-top: 1rem;">Enviar</button>
</form>