    @extends('layouts.admin')

    @section('content')
        <div class="container-fluid px-4">
            <div class="mb-1 hstack gap-2">
                <h2 class="mt-4">Equipes</h2>
                <ol class="breadcrumb mb-4 mt-4 ms-auto">
                    <li class="breadcrumb-item ">
                        <a href="#" class="text-decoration-none"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Equipes</li>
                </ol>
            </div>

            <div class="card mb-4">
                <div class="card-header hstack gap-2">
                    <span>Listar</span>
                    <span class="ms-auto">
                        <a class="btn btn-success btn-sm " href="{{ route('teams.create') }}">Cadastrar uma Equipe</a>
                    </span>
                </div>

                <div class="card-body">
                    {{-- Componente --}}
                    <x-alert />

                    <table class="table table-striped table-hover table-bordered">

                        <thead>
                            <tr>
                                <th class="d-none d-md-table-cell">#ID</th>
                                <th>Nome da Equipe</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- imprimir os registros --}}
                            @forelse ($teams as $team)
                                <tr>
                                    <th>{{ $team->id }}</th>
                                    <td> {{ $team->name }}</td>
                                    <td class="d-md-flex flex-row justify-content-center">
                                        <a href="{{ route('employee.create', ['team' => $team->id]) }}"
                                            class="btn btn-success btn-sm me-1 mt-1 mt-md-0">Cadastrar
                                            Colaborador</a>
                                        <a href="{{ route('employee.index', ['team' => $team->id]) }}"
                                            class="btn btn-primary btn-sm me-1 mt-1 mt-md-0 ">Listar Colaboradores</a>
                                        <a href="{{ route('teams.show', ['team' => $team->id]) }}"
                                            class="btn btn-info btn-sm me-1 mt-1 mt-md-0">Detalhes</a>
                                        {{-- <a href="{{ route('teams.edit', ['team' => $team->id]) }}"
                                            class="btn btn-warning btn-sm me-1 mt-1 mt-md-0">Editar</a>
                                        <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Tem certeza que deseja Apagar esta Equipe?')"
                                                class="btn btn-danger btn-sm me-1 mt-1 mt-md-0">Apagar</button>
                                        </form> --}}
                                    </td>

                                </tr>
                            @empty
                                <div class="alert alrt-danger" role="alert">
                                    Nenhuma equipe encontrada!
                                </div>
                            @endforelse
                        </tbody>

                    </table>
                    {{-- Imprimir a paginação --}}
                    {{ $teams->links()}}

                </div>
            </div>
        </div>
    @endsection
