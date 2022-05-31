<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteiraModel extends Model
{
    use HasFactory;

    protected $table = 'carteiras';
    public $fillable = ['descricao', 'status'];

}
