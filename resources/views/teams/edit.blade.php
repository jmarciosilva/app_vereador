@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-4">Editar Equipe</h2>
            <ol class="breadcrumb mb-4 mt-4 ms-auto">
                <li class="breadcrumb-item ">
                    <a href="#" class="text-decoration-none"> Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
                </li>
                <li class="breadcrumb-item active">Editar Equipe</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Editar uma Equipe</span>
            </div>

            <div class="card-body">
                {{-- Componente --}}
                <x-alert />

                <form class="row g-3" action="{{ route('teams.update', ['team' => $team->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nome da Equipe</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da equipe" value="{{ old('name', $team->name) }}" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
