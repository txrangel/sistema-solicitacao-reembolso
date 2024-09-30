<?php

namespace App\Http\Controllers;

use App\Models\StatusSolicitacao;
use Illuminate\Http\Request;

class StatusSolicitacaoController extends Controller
{
    public function index()
    {
        $status = StatusSolicitacao::all();
        return view('status.index', compact('status'));
    }

    public function create()
    {
        return view('status.form');
    }

    public function store(Request $request)
    {
        $request->validate(['descricao' => 'required']);

        StatusSolicitacao::create($request->all());

        return redirect()->route('status.index')->with('success', 'Status criado com sucesso.');
    }

    public function edit(StatusSolicitacao $status)
    {
        return view('status.form', compact('status'));
    }

    public function update(Request $request, StatusSolicitacao $status)
    {
        $request->validate(['descricao' => 'required']);

        $status->update($request->all());

        return redirect()->route('status.index')->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy(StatusSolicitacao $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Status excluído com sucesso.');
    }
}