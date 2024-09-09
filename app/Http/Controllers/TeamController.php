<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    // Listar os Teams
    public function index()
    {
        // recuperar os registros do banco de dados
        $teams = Team::orderBy('id', 'DESC')->paginate(10);

         // recuperar os registros com paginação
        //  $teams = Team::paginate(1);

        // salvar log
        Log::info('Listar Equipes');

       


        // carregar a view
        return view('teams.index', ['teams' => $teams]);
    }

    // Visualizar Team
    public function show(Team $team)
    {
        // salvar log
        Log::info('Visualizar Equipe', ['team_id' => $team->id]);

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

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {
            // Cadastrando no Banco de Dados na Tabela teams os valores do formulário
            $team = Team::create(['name' => $request->name]);

            // transação concluida com sucesso
            DB::commit();

            // salvar log
            Log::info('Equipe cadastrada', ['team_id' => $team->id]);

            // redirecionando o usuário, enviar mensagem de sucesso
            return redirect()->route('teams.show', ['team' => $team])->with('success', 'Equipe cadastrada com sucesso.');
        } catch (Exception $e) {
            // transação não foi concluída com êxito
            DB::rollBack();

            // salvar log
            Log::notice('Equipe não cadastrada', ['error' => $e->getMessage()]);

            // redirecionando o usuário, enviar mensagem 
            return back()->withInput()->with('error', 'Equipe não cadastrada!');
        }
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

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {
            // editar as informações do registro no banco de dados
            $team->update(['name' => $request->name]);

            DB::commit();

             // salvar log
             Log::info('Equipe editada', ['team_id' => $team->id]);

            // redirecionando o usuário, enviar mensagem de sucesso
            return redirect()->route('teams.show', ['team' => $team])->with('success', 'Equipe alterada com sucesso.');
        } catch (Exception $e) {
            // transação não foi concluída com êxito
            DB::rollBack();

            // salvar log
            Log::notice('Equipe não editada', ['error' => $e->getMessage()]);

            // redirecionando o usuário, enviar mensagem de erro
            return back()->withInput()->with('error', 'Equipe não editada!');
        }
    }

    // Apagar uma Equipe
    public function destroy(Team $team)
    {
        try {
            // apagando uma equipe na tabela do banco de dados
            $team->delete();

            // salvar log
            Log::info('Equipe apagada', ['team_id' => $team->id]);

            // redirecionando o usuário, enviar mensagem de sucesso
            return redirect()->route('teams.index')->with('success', 'Equipe Apagada com sucesso.');
        } catch (Exception $e) {
             // salvar log
             Log::notice('Equipe não apagada', ['error' => $e->getMessage()]);
            // redirecionando o usuário, enviar mensagem de erro
            return redirect()->route('teams.index')->with('error', 'EQUIPE CONTÉM COLABORADOR -  NÃO APAGADA!');
        }
    }
}
