<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     // indicar nome da tabela
     protected $table = 'employees';

     // indicar quais colunas serão cadastradas na tabela
     protected $fillable = ['name', 'email', 'phone', 'age', 'description', 'team_id'];

     // criando relacionamento entre um para muitos
    public function  team()
    {
       return $this->belongsTo(Team::class);
    }
}
