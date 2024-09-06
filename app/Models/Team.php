<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    // indicar nome da tabela
    protected $table = 'teams';

    // indicar quais colunas serão cadastradas na tabela
    protected $fillable = ['name'];

    // criando relacionamento entre um para muitos
    public function  employee()
    {
       return $this->hasMany(Employee::class);
    }
}
