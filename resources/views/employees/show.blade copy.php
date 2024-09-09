@extends('layouts.admin')

@section('content')
    <h1>Detalhes do Colaborador: {{ $employee->name }} </h1>
    <a href="{{ route('teams.index') }}">Listar Todas as Equipes</a><br>


    {{-- Componente --}}
    <x-alert />

    ID: {{ $employee->id }}<br>
    Nome: {{ $employee->name }}<br>
    Email: {{ $employee->email }}<br>
    Celular: {{ $employee->phone }}<br>
    Idade: {{ $employee->age }} anos<br>
    Descrição: {{ $employee->description }}<br>
    Criado: {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }} <br>
    Atualizado: {{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }} <br>
    Equipe: {{ $employee->team->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
