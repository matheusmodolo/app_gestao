@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href=" ">Consulta</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                                <td>
                                    <form method="POST" id="form-delete-{{ $cliente->id }}"
                                        action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#"
                                            onclick="document.getElementById('form-delete-{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{ $clientes->count() }} de {{ $clientes->total() }} clientes (de
                {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})

            </div>
        </div>

    </div>

@endsection
