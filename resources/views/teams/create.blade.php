@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-4">Cadastramento de Equipe</h2>
            <ol class="breadcrumb mb-4 mt-4 ms-auto">
                <li class="breadcrumb-item ">
                    <a href="#" class="text-decoration-none"> Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
                </li>
                <li class="breadcrumb-item active">Cadastro de Equipe</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Cadastrar uma Equipe</span>
            </div>

            <div class="card-body">
                {{-- Componente --}}
                <x-alert />

                <form class="row g-3" action="{{ route('teams.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="col-md-12">
                        <label for="name" class="form-label">Nome da Equipe</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da equipe" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
