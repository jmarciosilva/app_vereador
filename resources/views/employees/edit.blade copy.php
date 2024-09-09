@extends('layouts.admin')

@section('content')
    <h2>Editar Colaborador {{ $employee->name }}</h2>
    <a href="{{ route('teams.index') }} ">Listar Todas as Equipes</a><br><br>

    {{-- Componente --}}
    <x-alert />

    <form action="{{ route('employee.update', ['employee' => $employee->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome do colaborador" required
                value="{{ $employee->name }}"><br>
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" name="email" id="email" placeholder="Email do colaborador" required
                value="{{ $employee->email }}"><br>
        </div>
        <div class="form-group">
            <label>Celular: </label>
            <input type="text" name="phone" id="phone" placeholder="Celular do colaborador" required
                value="{{ $employee->phone }}"><br>
        </div>
        <div class="form-group">
            <label>Idade: </label>
            <input type="number" name="age" id="age" required value="{{$employee->age }}"><br>
        </div>
        <div class="form-group">
            <label>Equipe: </label>
            <select name="team_id" id="team_id" class="form-control" required>
                <option value="">Selecione uma equipe</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" 
                        {{ $employee->team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Descrição: </label>
            <textarea name="description" id="description" rows="4" cols="30" required >{{ $employee->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection

