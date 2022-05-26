<div>

    <form wire:submit.prevent="gravar" method="POST">
        <div style="padding-bottom: 10px;">
            <label for="descricao">Descrição Tarefa:</label>
            <input wire:model="descricao" type="text" name="descricao" id="descricao" placeholder="Descrição Tarefa"
                required>
        </div>
        <div style="padding-bottom: 10px;">
            <label for="dataPrevista">Data:</label>
            <input wire:model="dataPrevista" type="date" name="dataPrevista" id="dataPrevista" placeholder="Data">
        </div>
        <div>
            <input type="submit" value="Gravar">
        </div>
    </form>

    <table style="border: 1px solid; margin-top: 10px;">
        <thead>
            <tr>
                <th style="border: 1px solid">Id</th>
                <th style="border: 1px solid">Descricao</th>
                <th style="border: 1px solid">Data Prevista</th>
                <th style="border: 1px solid">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $key => $tarefa)
            <tr>
                <td style="border: 1px solid">{{$key + 1}}</td>
                <td style="border: 1px solid">{{$tarefa->descricao}}</td>
                <td style="border: 1px solid">{{$tarefa->data_prevista}}</td>
                <td style="border: 1px solid">
                    <button wire:click="fechar({{$tarefa->id}})" style="margin:2px;">Fechar</button>
                    <button wire:click="excluir({{$tarefa->id}})">Excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>