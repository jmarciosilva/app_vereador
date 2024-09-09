@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-4">{{$employee->name}}</h2>
            <ol class="breadcrumb mb-4 mt-4 ms-auto">
                <li class="breadcrumb-item ">
                    <a href="#" class="text-decoration-none"> Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
                </li>
                
                <li class="breadcrumb-item active">Colaborador</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Detalhes  {{$employee->name}}</span>
                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}"
                        class="btn btn-warning btn-sm me-1 mt-1 mt-md-0">Editar</a>

                        <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" onclick="return confirm('Tem certeza que deseja Apagar este Colaborador?')"
                            class="btn btn-danger btn-sm me-1 mt-1 mt-md-0">Apagar</button>
                        </form>
                   
                </span>
            </div>

            <div class="card-body">
                {{-- Componente --}}
                <x-alert />

                <dl class="row">
                    <dt class="col-sm-3">ID: </dt>
                    <dd class="col-sm-9"> {{ $employee->id }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Nome: </dt>
                    <dd class="col-sm-9"> {{ $employee->name }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Email: </dt>
                    <dd class="col-sm-9"> {{ $employee->email }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Celular: </dt>
                    <dd class="col-sm-9"> {{ $employee->phone }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Idade: </dt>
                    <dd class="col-sm-9"> {{ $employee->age }} anos</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Descrição: </dt>
                    <dd class="col-sm-9"> {{ $employee->description }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Equipe: </dt>
                    <dd class="col-sm-9"> {{ $employee->team->name }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Cadastrado em: </dt>
                    <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-3">Atualizado em: </dt>
                    <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }}</dd>
                </dl>

                

                

            </div>
        </div>
    </div>
@endsection

