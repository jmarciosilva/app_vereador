<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Listar os Teams
    public function index()
    {
        // recuperar os registros do banco de dados
         $teams = Team::orderBy('id', 'DESC')->get();

         // recuperar os registros com paginação
        //  $teams = Team::paginate(1);


        // carregar a view
        return view('teams.index', ['teams' => $teams]);
    }

    // Visualizar Team
    public function show(Team $team)
    {
        // carregar a view com os dados recuperados do banco de dados
        return view('teams.show', ['team' => $team]);
    }

    // Apresentar View com Form Cadastrar uma Equipe
    public function create()
    {
        // carregar a view
        return view('teams.create');
    }

    // Salvar um Team no Banco de dADOS
    public function store(TeamRequest $request)
    {
        // validar o formulário
        $request->validated();

        // Cadastrando no Banco de Dados na Tabela teams os valores do formulário
        $team = Team::create(['name' => $request->name]);

        // redirecionando o usuário, enviar mensagem de sucesso
        return redirect()->route('teams.show', ['team' => $team])->with('success', 'Equipe cadastrada com sucesso.');
    }

    // Apresentar a View Form para Editar Equipe
    public function edit(Team $team)
    {
        // carregar a view
        return view('teams.edit', ['team' => $team]);
    }

    // Editar uma Equipe no Banco de Dados
    public function update(TeamRequest $request, Team $team)
    {
        // validar o formulário
        $request->validated();

        // editar as informações do registro no banco de dados
        $team->update(['name' => $request->name]);

        // redirecionando o usuário, enviar mensagem de sucesso
        return redirect()->route('teams.show', ['team' => $team])->with('success', 'Equipe alterada com sucesso.');
    }

    // Apagar uma Equipe
    public function destroy(Team $team)
    {
        // apagando uma equipe na tabela do banco de dados
        $team->delete();

        // redirecionando o usuário, enviar mensagem de sucesso
        return redirect()->route('teams.index')->with('success', 'Equipe Apagada com sucesso.');




    }
}
