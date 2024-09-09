<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Captura o ID ou objeto Employee
        $employee = $this->route('employee');

        // verificando se a rota é de atualização
        if ($this->route()->getName() === 'employee.update') {
            return [
                'team_id' => 'required',
                'name' => 'required',
                'age' => 'required',
                'description' => 'required'
            ];
        } else {
            // Regras para cadastro
            return [
                'team_id' => 'required',
                'name' => 'required',
                'email' => 'required|unique:App\Models\Employee,email',
                'phone' => 'required|unique:App\Models\Employee,phone',
                'age' => 'required',
                'description' => 'required'
            ];
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome do Colaborador é obrigatório',
            'email.required' => 'Campo email do Colaborador é obrigatório',
            'phone.required' => 'Campo celular do Colaborador é obrigatório',
            'age.required' => 'Campo idade do Colaborador é obrigatório',
            'description.required' => 'Campo descrição do Colaborador é obrigatório',
            'email.unique' => 'Este email de colaborador já foi cadastrado!',
            'phone.unique' => 'Este celular de colaborador já foi cadastrado!'
        ];
    }
}
