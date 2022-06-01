<div>
    <div class="row">
        <div class="col-md-12">
            <button wire:click="createCarteira()" type="button" class="btn btn-primary mb-5 col-md-3">
                Cadastrar Nova Carteira
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descrição Carteira</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <div>
                        @foreach($carteiras as $key => $carteira)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$carteira->descricao}}</td>
                            <td>
                                @switch($carteira->status)
                                @case(1)
                                Ativo
                                @break
                                @case(0)
                                Inativo
                                @break
                                @endswitch
                            </td>
                            <td>
                                <button wire:click="editCarteira({{$carteira->id}})" class="btn btn-secondary"
                                    type="button">Editar</button>
                                <button wire:click="deleteCarteira({{$carteira->id}})" class="btn btn-danger"
                                    type="button">Excluir</button>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$tituloModal}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{$actionForm}}">
                        <div class="form-group">
                            <label for="descricao" class="control-label">Descrição</label>
                            <input wire:model="idCarteira" type="hidden" name="idCarteira" id="idCarteira">
                            <input wire:model="descricao" type="text" name="descricao" id="descricao"
                                class="form-control">
                            @error('descricao')
                            <span class="text-danger" style="font-size: 11.5px;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">Situação</label>
                            <select wire:model="status" name="status" id="status" class="form-select">
                                <option value=""  selected disable>Selecione</option>
                                <option value="1" @if(isset($sitaucao)) selected @endif>Ativo</option>
                                <option value="0" @if(isset($sitaucao)) selected @endif>Inativo</option>
                            </select>
                            @error('status')
                            <span class="text-danger" style="font-size: 11.5px;">{{$message}}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>

    window.addEventListener('showModal', event => {
        $('#exampleModal').modal('show');
    });

    window.addEventListener('hideModal', event => {
        $('#exampleModal').modal('hide');
    })

</script>
@endsection