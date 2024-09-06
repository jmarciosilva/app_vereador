    @extends('layouts.admin')

    @section('content')
        <h1>Sistema Ewerton</h1><br>

        <a href="{{ route('teams.create') }}">Cadastrar uma Equipe</a><br>
        <hr>
        {{-- Componente --}}
        <x-alert />

        <h2>Lista das Equipes Cadastradas</h2><br>
        <hr>
        {{-- imprimir os registros --}}
        @forelse ($teams as $team)
            {{ $team->id }} <br>
            {{ $team->name }} <br>
            {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i:s') }} <br>
            {{ \Carbon\Carbon::parse($team->updated_at)->format('d/m/Y H:i:s') }} <br>

            <a href="{{ route('employee.index', ['team' => $team->id]) }}">Listar Colaboradores da Equipe</a> &nbsp&nbsp
            <a href="{{ route('teams.show', ['team' => $team->id]) }}">Visualizar</a> &nbsp&nbsp
            <a href="{{ route('teams.edit', ['team' => $team->id]) }}">Editar</a> &nbsp&nbsp
            <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Tem certeza que deseja Apagar esta Equipe?')"
                    class="btn btn-primary">Apagar</button>
            </form>


            <hr>
        @empty
            <p style="color: #f00">Nenhuma equipe encontrada! </p>
        @endforelse

        {{-- imprimir paginação --}}
        {{-- {{ $teams->links() }} --}}
    @endsection
