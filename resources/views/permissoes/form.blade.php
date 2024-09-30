<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($permissao) ? 'Editar Permissão' : 'Criar Permissão' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($permissao) ? route('permissao.update', $permissao) : route('permissao.store') }}" method="POST">
                        @csrf
                        @if(isset($permissao))
                            @method('PUT')
                        @endif
            
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($permissao) ? $permissao->nome : '' }}" required>
                        </div>
            
                        <button type="submit" class="btn btn-success mt-3">{{ isset($permissao) ? 'Atualizar' : 'Criar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>