<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('solicitacao.create') }}" class="btn btn-primary">Criar Solicitação</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuário</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitacoes as $solicitacao)
                                <tr>
                                    <td>{{ $solicitacao->id }}</td>
                                    <td>{{ $solicitacao->usuario->name }}</td>
                                    <td>{{ $solicitacao->created_at }}</td>
                                    <td>{{ $solicitacao->status->descricao }}</td>
                                    <td>
                                        <a href="{{ route('solicitacao.edit', $solicitacao) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('solicitacao.destroy', $solicitacao) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
