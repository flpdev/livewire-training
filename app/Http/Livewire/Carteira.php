<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarteiraModel;

class Carteira extends Component
{
    // VARÍAVEIS PARA ARMAZENAMENTO DE DADOS INPUT
    public $carteiras;
    public $idCarteira;
    public $descricao;
    public $status;

    // VARIÁVEL PARA DEFINIÇÃO DO ACTION DO FORM (MODAL)
    public $actionForm;

    // VARIÁVEL TÍTULO DO MODAL CREATE/UPDATE
    public $tituloModal;

    // FUNÇÃO NATIVA LIVEWIRE QUE DEFINE AS INFORMAÇÕES QUE SERÃO RENDERIZADAS NA TELA
    public function render()
    {
        $this->carteiras = CarteiraModel::all();
        $dados = [
            'carteiras' => $this->carteiras,
            'tituloModal' => $this->tituloModal,
            'idCarteira' => $this->idCarteira
        ];
        return view('livewire.carteira')->with($dados);
    }

    public function createCarteira(){
        // APAGA OS CAMPOS DO FORMULÁRIO DO MODAL
        $this->eraseFields();
        // ALIMENTA VARIÁVEL ACTION FORM PARA MODIFICAR O ACTION DO FORMULÁRIO DO MODAL - CREATE
        $this->actionForm = 'storeCarteira';
        // DISPARA EVENTO PARA O JAVASCRITP QUE É SONDADO NO FRONTEND PARA ABERTURA DO MODAL
        $this->dispatchBrowserEvent('showModal');
        // ALIMENTA VARIÁVEL TÍTULO MODAL
        $this->tituloModal = 'Cadastrar Nova Carteira';
    }

    public function storeCarteira(){
        // REALIZA VALIDAÇÃO DOS DADOS SUBMETIDOS VIA VARIÁVEL, SÃO VERIFICADOS OS CAMPOS IDENTIFICADOS COMA TAG WIRE:MODEL
        $this->validate([
            'descricao' => 'required',
            'status' => 'required'
        ]);
        
        CarteiraModel::create([
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);
        // DISPARA EVENTO PARA O JAVASCRITP QUE É SONDADO NO FRONTEND PARA FECHAMENTO DO MODAL
        $this->dispatchBrowserEvent('hideModal');
        // APAGA OS CAMPOS DO FORMULÁRIO DO MODAL
        $this->eraseFields();

    }

    public function editCarteira($idCarteira){

        // ALIMENTA VARIÁVEL TÍTULO MODAL
        $this->tituloModal = 'Editar Carteira';
        // ALIMENTA VARIÁVEL ACTION FORM PARA MODIFICAR O ACTION DO FORMULÁRIO DO MODAL - EDIT
        $this->actionForm = 'updateCarteira';
        // DISPARA EVENTO PARA O JAVASCRITP QUE É SONDADO NO FRONTEND PARA ABERTURA DO MODAL
        $this->dispatchBrowserEvent('showModal');

        $carteira = CarteiraModel::find($idCarteira);

        // ALIMENTA AS VARIÁVEIS DE INPUT COM INFORMAÇÕES DO REGISTRO SELECIONADO
        $this->descricao = $carteira->descricao;
        $this->status = $carteira->status;
        $this->idCarteira = $carteira->id;
    }

    public function updateCarteira(){

        // REALIZA VALIDAÇÃO DOS DADOS SUBMETIDOS VIA VARIÁVEL, SÃO VERIFICADOS OS CAMPOS IDENTIFICADOS COMA TAG WIRE:MODEL
        $this->validate([
            'descricao' => 'required',
            'status' => 'required',
            'idCarteira' => 'required'
        ]);

        CarteiraModel::find($this->idCarteira)->update([
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

        // DISPARA EVENTO PARA O JAVASCRITP QUE É SONDADO NO FRONTEND PARA FECHAMENTO DO MODAL
        $this->dispatchBrowserEvent('hideModal');
        // APAGA OS CAMPOS DO FORMULÁRIO DO MODAL
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
