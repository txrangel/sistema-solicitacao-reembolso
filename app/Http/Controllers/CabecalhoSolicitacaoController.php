<?php

namespace App\Http\Controllers;

use App\Models\CabecalhoSolicitacao;
use App\Models\Setor;
use App\Models\StatusSolicitacao;
use Illuminate\Http\Request;

class CabecalhoSolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacoes = CabecalhoSolicitacao::all();
        return view('solicitacoes.index', compact('solicitacoes'));
    }

    public function create()
    {
        $setores = Setor::all();
        $status = StatusSolicitacao::all();
        return view('solicitacoes.form', compact('setores', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required',
            'setor_id' => 'required',
            'status_solicitacao_id' => 'required',
            'observacao' => 'nullable',
            'total' => 'required|numeric',
        ]);

        CabecalhoSolicitacao::create($request->all());

        return redirect()->route('solicitacao.index')->with('success', 'Solicitação criada com sucesso.');
    }

    public function edit(CabecalhoSolicitacao $solicitacao)
    {
        $setores = Setor::all();
        $status = StatusSolicitacao::all();
        return view('solicitacoes.form', compact('solicitacao', 'setores', 'status'));
    }

    public function update(Request $request, CabecalhoSolicitacao $solicitacao)
    {
        $request->validate([
            'setor_id' => 'required',
            'status_solicitacao_id' => 'required',
            'observacao' => 'nullable',
            'total' => 'required|numeric',
        ]);

        $solicitacao->update($request->all());

        return redirect()->route('solicitacao.index')->with('success', 'Solicitação atualizada com sucesso.');
    }

    public function destroy(CabecalhoSolicitacao $solicitacao)
    {
        $solicitacao->delete();
        return redirect()->route('solicitacao.index')->with('success', 'Solicitação excluída com sucesso.');
    }
}