<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tarefas;

class ListaTarefas extends Component
{


    public $tarefas;

    public $descricao;

    public $dataPrevista;

    protected $rules = [
        'descricao' => 'required',
        'dataPrevista' => 'required',
    ];

    public function render()
    {
        $this->tarefas = Tarefas::orderBy('id', 'desc')->get();
        return view('livewire.lista-tarefas');
    }

    public function index()
    {
        return view('livewire.tarefas');
    }

    public function gravar()
    {

        $this->validate();

        Tarefas::create([
            'descricao' => $this->descricao,
            'data_prevista' => $this->dataPrevista,
            'situacao' => 'pendente'
        ]);

        $this->limpaCampos();
    }

    public function limpaCampos(){
        $this->descricao = '';
        $this->dataPrevista = '';
    }

    public function excluir($idTarefa){
        Tarefas::find($idTarefa)->delete();
    }

    public function fechar($idTarefa){

    }
}
