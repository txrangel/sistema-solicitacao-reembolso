<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($solicitacao) ? 'Editar Solicitação' : 'Criar Solicitação' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($solicitacao) ? route('solicitacao.update', $solicitacao) : route('solicitacao.store') }}" method="POST">
                        @csrf
                        @if(isset($solicitacao))
                            @method('PUT')
                        @endif
            
                        <div class="form-group">
                            <label for="usuario_id">Usuário</label>
                            <select class="form-control" id="usuario_id" name="usuario_id">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ isset($solicitacao) && $solicitacao->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <select class="form-control" id="status_id" name="status_id">
                                @foreach($status as $stat)
                                    <option value="{{ $stat->id }}" {{ isset($solicitacao) && $solicitacao->status_id == $stat->id ? 'selected' : '' }}>{{ $stat->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <button type="submit" class="btn btn-success mt-3">{{ isset($solicitacao) ? 'Atualizar' : 'Criar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>