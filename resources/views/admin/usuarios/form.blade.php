<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($usuario) ? 'Editar Usuário' : 'Criar Usuário' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($usuario) ? route('usuario.update', $usuario) : route('usuario.store') }}" method="POST">
                        @csrf
                        @if(isset($usuario))
                            @method('PUT')
                        @endif
                
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($usuario) ? $usuario->name : '' }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ isset($usuario) ? $usuario->email : '' }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Deixe em branco para não alterar">
                        </div>
                
                        {{-- <div class="form-group">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" id="ativo" name="ativo">
                                <option value="1" {{ isset($usuario) && $usuario->ativo ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ isset($usuario) && !$usuario->ativo ? 'selected' : '' }}>Não</option>
                            </select>
                        </div> --}}
                
                        <button type="submit" class="btn btn-success mt-3">{{ isset($usuario) ? 'Atualizar' : 'Criar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>