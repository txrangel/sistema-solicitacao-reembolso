<?php

namespace App\Http\Controllers;

use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    public function index()
    {
        $permissoes = Permissao::all();
        return view('permissoes.index', compact('permissoes'));
    }

    public function create()
    {
        return view('permissoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Permissao::create($request->all());

        return redirect()->route('permissoes.index')->with('success', 'Permissão criada com sucesso.');
    }

    public function edit(Permissao $permissao)
    {
        return view('permissoes.edit', compact('permissao'));
    }

    public function update(Request $request, Permissao $permissao)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $permissao->update($request->all());

        return redirect()->route('permissoes.index')->with('success', 'Permissão atualizada com sucesso.');
    }

    public function destroy(Permissao $permissao)
    {
        $permissao->delete();
        return redirect()->route('permissoes.index')->with('success', 'Permissão excluída com sucesso.');
    }
}