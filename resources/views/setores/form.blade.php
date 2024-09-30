<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($setor) ? 'Editar Setor' : 'Criar Setor' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($setor) ? route('setor.update', $setor) : route('setor.store') }}" method="POST">
                        @csrf
                        @if(isset($setor))
                            @method('PUT')
                        @endif
            
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($setor) ? $setor->nome : '' }}" required>
                        </div>
            
                        <button type="submit" class="btn btn-success mt-3">{{ isset($setor) ? 'Atualizar' : 'Criar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>