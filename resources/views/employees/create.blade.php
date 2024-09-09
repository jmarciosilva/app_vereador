@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-4">Cadastramento de Colaboradores</h2>
            <ol class="breadcrumb mb-4 mt-4 ms-auto">
                <li class="breadcrumb-item ">
                    <a href="#" class="text-decoration-none"> Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
                </li>
                <li class="breadcrumb-item active">Cadastro de Colaborador</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Cadastrar um Colaborador</span>
            </div>

            <div class="card-body">
                {{-- Componente --}}
                <x-alert />

                <form class="row g-3"action="{{ route('employee.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="team_id" id="team_id" value="{{ $team->id }}">

                    <div class="col-md-12">
                        <label for="name" class="form-label">Nome do Colaborador</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do colaborador" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email do Colaborador</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do colaborador" value="{{ old('email') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label for="phone" class="form-label">Celular do Colaborador</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o celular do colaborador" value="{{ old('phone') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label for="name" class="form-label">Idade do Colaborador</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Digite a idade do colaborador" value="{{ old('age') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Descrição do Colaborador</label>
        
                        <input type="text" class="form-control" id="description" name="description" placeholder="Digite uma descrição do colaborador" value="{{ old('description') }}" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
