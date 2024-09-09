<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Team;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index(Team $team)
    {
        // recuperando os colaboradores de cada equipe
        $employees =  Employee::with('team')
            ->where('team_id', $team->id)
            ->orderBy('name')
            ->get();

        // salvar log
        Log::info('Listar Colaboradores');

        // carregar a view com os colaboradores da respectiva equipe
        return view('employees.index', ['employees' => $employees]);
    }

    // carregar o formulário para cadastrar novo colaborador
    public function create(Team $team)
    {
        // carregar a view
        return view('employees.create', ['team' => $team]);
    }

    // cadastrando no banco de dados novo colaborador
    public function store(EmployeeRequest $request)
    {
        // validando o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // cadastrar no banco de dados na tabela employess
            Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'description' => $request->description,
                'team_id' => $request->team_id
            ]);

            DB::commit();

             // salvar log
             Log::info('Colaborador cadastrado', ['team_id' => $request->team_id]);

            // redirecionar o usuário e enviar mensagem de sucesso
            return redirect()->route('employee.index', ['team' => $request->team_id])
                ->with('success', 'Colaborador cadastrado com sucesso.');
        } catch (Exception $e) {
            // transação não foi concluída com êxito
            DB::rollBack();

            // salvar log
            Log::notice('Colaborador não cadastrado', ['error' => $e->getMessage()]);

            // redirecionando o usuário, enviar mensagem 
            return back()->withInput()->with('error', 'Colaborador não cadastrado!');
        }
    }

    // carregar formulário para editar colaborador
    public function edit(Employee $employee)
    {
        // recuperar as equipes caso o colaborador seja enviado para outra equipe
        $teams = Team::all();

        // Carregar a view
        return view('employees.edit', ['employee' => $employee, 'teams' => $teams]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        // validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // editar as informações do registro no banco de dados
            $employee->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'team_id' => $request->team_id,
                'description' => $request->description
            ]);

            DB::commit();

             // salvar log
             Log::info('Colaborador editado', ['employee_id' => $employee->id]);

            // redirecionar o usuário e enviar mensagem de sucesso
            return redirect()->route('employee.index', ['team' => $request->team_id])
                ->with('success', 'Colaborador editado com sucesso.');
        } catch (Exception $e) {
            // transação não foi concluída com êxito
            DB::rollBack();

            // salvar log
            Log::notice('Colaborador não editado', ['error' => $e->getMessage()]);

            // redirecionando o usuário, enviar mensagem de erro
            return back()->withInput()->with('error', 'Colaborador não editado!');
        }
    }

    // Visualizar colaborador
    public function show(Employee $employee)
    {
        // carregar a view com os dados recuperados do banco de dados
        return view('employees.show', ['employee' => $employee]);
    }

    // Excluir colaborador
    public function destroy(Employee $employee)
    {
        try {
            // excluindo o registro no banco de dados
            $employee->delete();

             // salvar log
             Log::info('Colaborador apagado', ['employee_id' => $employee->id]);

            // redirecionar o usuário e enviar mensagem de sucesso
            return redirect()->route('employee.index', ['team' => $employee->team_id])
                ->with('success', 'Colaborador apagado com sucesso.');
        } catch (Exception $e) {
             // salvar log
             Log::notice('Colaborador não apagado', ['error' => $e->getMessage()]);

            // redirecionar o usuário e enviar mensagem de sucesso
            return redirect()->route('employee.index', ['team' => $employee->team_id])
                ->with('error', 'COLABORADOR NÃO APAGADO!');
        }
    }
}
