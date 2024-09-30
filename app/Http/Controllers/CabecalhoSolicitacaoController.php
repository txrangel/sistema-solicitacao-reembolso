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
    public function edit(CabecalhoSolicitacao $solicitacao)
    {
        $setores = Setor::all();
        $status = StatusSolicitacao::all();
        return view('solicitacoes.form', compact('solicitacao', 'setores', 'status'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'usuario_id' => 'required',
                'setor_id' => 'required',
                'status_solicitacao_id' => 'required',
                'observacao' => 'nullable',
                'total' => 'required|numeric',
            ]);
            CabecalhoSolicitacao::create($request->all());
            return redirect()->route('solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Solicitação criada com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function update(Request $request, CabecalhoSolicitacao $solicitacao)
    {
        try{
            $request->validate([
                'setor_id' => 'required',
                'status_solicitacao_id' => 'required',
                'observacao' => 'nullable',
                'total' => 'required|numeric',
            ]);
            $solicitacao->update($request->all());
            return redirect()->route('solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Solicitação atualizada com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(CabecalhoSolicitacao $solicitacao)
    {
        try{
            $solicitacao->delete();
            return redirect()->route('solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Solicitação excluída com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}