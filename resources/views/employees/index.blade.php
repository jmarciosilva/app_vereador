@extends('layouts.admin')

@section('content')
    <h2>Lista dos Colaboradores</h2><br>
    <a href="{{ route('teams.index') }}">Listar Todas as Equipes</a><br><br>


    {{-- Componente --}}
    <x-alert />

    @forelse ($employees as $employee)
       ID:  {{ $employee->id }}<br>
       Nome:  {{ $employee->name }}<br>
       Email:  {{ $employee->email }}<br>
       Celular:  {{ $employee->phone }}<br>
       Idade:  {{ $employee->age }} anos<br>
       Descrição:  {{ $employee->description }}<br>
       Criado:   {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y H:i:s') }} <br>
       Atualizado:  {{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y H:i:s') }} <br>
       Equipe: {{ $employee->team->name }}<br>
       <hr>
    @empty
    <p style="color: #f00">Nenhum Colaborador encontrado! </p>
    @endforelse
@endsection
