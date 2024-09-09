@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-4">{{$team->name}}</h2>
            <ol class="breadcrumb mb-4 mt-4 ms-auto">
                <li class="breadcrumb-item ">
                    <a href="#" class="text-decoration-none"> Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
                </li>
                <li class="breadcrumb-item active">{{$team->name}}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Detalhes da {{$team->name}}</span>
                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('employee.index', ['team' => $team->id]) }}"
                        class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0 ">Listar Colaboradores</a>
                    <a class="btn btn-warning btn-sm me-1 mb-1 mb-sm-0" href="{{ route('teams.edit', ['team' => $team->id]) }}">Editar esta Equipe</a>
                    <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Tem certeza que deseja Apagar esta Equipe?')"
                            class="btn btn-danger btn-sm me-1 mb-1 mb-sm-0">Apagar</button>
                    </form>
                </span>
            </div>

            <div class="card-body">
                {{-- Componente --}}
                <x-alert />

                <dl class="row">
                    <dt class="col-sm-3">ID: </dt>
                    <dd class="col-sm-9"> {{ $team->id }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Nome: </dt>
                    <dd class="col-sm-9"> {{ $team->name }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Cadastrado em: </dt>
                    <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Atualizado em: </dt>
                    <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($team->updated_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>

                

                

            </div>
        </div>
    </div>
@endsection
