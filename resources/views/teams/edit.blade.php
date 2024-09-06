@extends('layouts.admin')

@section('content')
    <h1>Editar Team</h1>
    <a href="{{ route('teams.index') }}">Listar Todos os Teams</a><br><br>
    {{-- Componente --}}
    <x-alert />
    <form action="{{ route('teams.update', ['team' => $team->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome da Equipe" required
                value="{{ old('name', $team->name) }}"><br>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection
