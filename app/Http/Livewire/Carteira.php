<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarteiraModel;

class Carteira extends Component
{
    public $carteiras;
    public $descricao;
    public $sitaucao;

    public $tituloModal;

    protected $rules = [
        'descricao' => 'required',
        'status' => 'required',
    ];
    
    public function render()
    {
        $this->carteiras = CarteiraModel::all();
        $dados = [
            'carteiras' => $this->carteiras,
            'tituloModal' => $this->tituloModal
        ];
        return view('livewire.carteira')->with($dados);
    }

    public function createCarteira(){
        $this->eraseFields();
        $this->dispatchBrowserEvent('showModal');
        $this->tituloModal = 'Cadastrar Nova Carteira';
    }

    public function storeCarteira(){

        $this->validate();

        CarteiraModel::create([
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

        $this->eraseFields();

    }

    public function editCarteira($idCarteira){

        $this->tituloModal = 'Editar Carteira';
        $this->dispatchBrowserEvent('showModal');

        $cateira = CarteiraModel::find($idCarteira);
        $this->descricao = $cateira->descricao;
        $this->status = $cateira->status;
    }

    public function updateCarteira($idCarteira){

        $this->validate();
        CarteiraModel::find($idCarteira)->update([
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

        $this->eraseFields();
    }

    public function deleteCarteira($idCarteira){
        CarteiraModel::find($idCarteira)->delete();
    }

    public function eraseFields(){
        $this->descricao = null;
        $this->status = null;
    }
}
