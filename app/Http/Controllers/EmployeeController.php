<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Team;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Team $team)
    {
        // recuperando os colaboradores de cada equipe
        $employees =  Employee::with('team')
            ->where('team_id', $team->id)
            ->orderBy('name')
            ->get();

        // carregar a view com os colaboradores da respectiva equipe
        return view('employees.index', ['employees' => $employees]);
    }
}
