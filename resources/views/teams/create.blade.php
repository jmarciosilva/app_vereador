@extends('layouts.admin')

@section('content')
    <h1>Cadastrar Uma Equipe</h1>
    <p></p>
    <a href="{{ route('teams.index') }} ">Listar Todos os Teams</a><br><br>
    {{-- Componente --}}
    <x-alert />

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome da Equipe" required
                value="{{ old('name') }}"><br>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
