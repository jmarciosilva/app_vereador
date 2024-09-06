@extends('layouts.admin')

@section('content')
    <h1>Detalhes de uma Equipe</h1>
    <a href="{{ route('teams.index') }}">Listar Todas as Equipes</a><br>
    <a href="{{ route('teams.edit', ['team' => $team->id]) }}">Editar esta Equipe</a><br><br>
    
    {{-- Componente --}}
    <x-alert />

    ID: {{ $team->id }}<br>
    Nome: {{ $team->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($team->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
