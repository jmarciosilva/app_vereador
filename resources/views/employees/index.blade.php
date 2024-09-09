@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-4">Equipe </h2>
        <ol class="breadcrumb mb-4 mt-4 ms-auto">
            <li class="breadcrumb-item ">
                <a href="{{ route('teams.index') }}" class="text-decoration-none"> Equipes</a>
            </li>
            <li class="breadcrumb-item active">Colaboradores</li>
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

            <table class="table table-striped table-hover table-bordered table-sm">

                <thead>
                    <tr class="">
                        <th class="d-none d-md-table-cell">#ID</th>
                        <th>Nome</th>
                        <th class="d-none d-md-table-cell">Email</th>
                        <th>Celular</th>
                        <th class="d-none d-md-table-cell">Idade</th>
                        <th class="d-none d-md-table-cell">Descrição</th>
                        <th class="d-none d-md-table-cell">Equipe</th>
                        <th class="d-none d-md-table-cell" >Cadastrado</th>
                        <th class="d-none d-md-table-cell">Atualizado</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- imprimir os registros --}}
                    @forelse ($employees as $employee)
                        <tr>
                            <th class="d-none d-md-table-cell">{{ $employee->id }}</th>
                            <td> {{ $employee->name }}</td>
                            <td class="d-none d-md-table-cell">{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td class="d-none d-md-table-cell">{{ $employee->age }} anos</td>
                            <td class="d-none d-md-table-cell">{{ $employee->description }}</td>
                            <td class="d-none d-md-table-cell">{{ $employee->team->name }}</td>
                            <td class="d-none d-md-table-cell"> {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="d-md-flex flex-row justify-content-center">
                                
                             
                                <a href="{{ route('employee.show', ['employee' => $employee->id]) }}"
                                    class="btn btn-info btn-sm me-1 mt-1 mt-md-0">Detalhes</a>
                                {{-- <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}"
                                    class="btn btn-warning btn-sm me-1 mt-1 mt-md-0">Editar</a>

                                    <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja Apagar este Colaborador?')"
                                        class="btn btn-danger btn-sm me-1 mt-1 mt-md-0">Apagar</button>
                                    </form> --}}

                                
                               
                            </td>

                        </tr>
                    @empty
                        <div class="alert alrt-danger" role="alert">
                            Nenhum Colaborador encontrado!
                        </div>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>





















        {{-- @forelse ($employees as $employee) --}}
            {{-- <h2>Lista dos Colaboradores {{ $employee->team->name }}</h2><br>
            <a href="{{ route('teams.index') }}">Listar Todas as Equipes</a><br><br> --}}
            {{-- Componente --}}
            {{-- <x-alert /> --}}

            {{-- ID: {{ $employee->id }}<br>
            Nome: {{ $employee->name }}<br>
            Email: {{ $employee->email }}<br>
            Celular: {{ $employee->phone }}<br>
            Idade: {{ $employee->age }} anos<br>
            Descrição: {{ $employee->description }}<br>
            Criado: {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }} <br>
            Atualizado: {{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }} <br>
            Equipe: {{ $employee->team->name }}<br>
            <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}">Editar Colaborador</a> &nbsp&nbsp
            <a href="{{ route('employee.show', ['employee' => $employee->id]) }}">Detalhes do Colaborador</a> &nbsp&nbsp
            <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Tem certeza que deseja Apagar este Colaborador?')"
                    class="btn btn-primary">Apagar</button>
            </form> 
            <hr>
        @empty
            <p style="color: #f00">Nenhum Colaborador encontrado! </p>
            <a href="{{ route('teams.index') }}">Listar Todas as Equipes</a><br><br>
        @endforelse
--}}

    @endsection
