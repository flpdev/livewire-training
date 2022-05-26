<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;
    protected $table = 'tarefas';
    public $fillable = ['descricao', 'data_prevista', 'data_realizacao', 'situacao'];
}
