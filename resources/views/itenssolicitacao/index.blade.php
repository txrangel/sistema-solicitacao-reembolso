@extends('layouts.app')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Itens da Solicitação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('solicitacao.item.create', $solicitacao->id) }}" class="btn btn-primary">Adicionar Item</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itens as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->descricao }}</td>
                                    <td>{{ $item->quantidade }}</td>
                                    <td>{{ $item->valor }}</td>
                                    <td>
                                        <a href="{{ route('solicitacao.item.edit', [$solicitacao->id, $item->id]) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('solicitacao.item.destroy', [$solicitacao->id, $item->id]) }}" method="POST" style="display:inline;">
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