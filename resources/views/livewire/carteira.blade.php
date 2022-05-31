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
                                <button wire:click="deleteCarteira({{$carteira->id}})" class="btn btn-secondary"
                                    type="button">Editar</button>
                                <button wire:click="createCarteira({{$carteira->id}})" class="btn btn-danger"
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Carteira</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" >
                        <div class="form-group">
                            <label for="descricao" class="control-label">Descrição</label>
                            <input wire:model="descricao" type="text" name="descricao" id="descricao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label">Situação</label>
                            <select wire:model="status" name="status" id="status" class="form-select">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>

    window.addEventListener('showModal', event => {
        $('#exampleModal').modal('show');
    });

</script>
@endsection