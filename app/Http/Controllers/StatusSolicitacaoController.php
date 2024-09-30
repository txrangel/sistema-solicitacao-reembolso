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
    public function edit(StatusSolicitacao $status)
    {
        return view('status.form', compact('status'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate(['descricao' => 'required']);
            StatusSolicitacao::create($request->all());
            return redirect()->route('status-solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Status criado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function update(Request $request, StatusSolicitacao $status)
    {
        try{
            $request->validate(['descricao' => 'required']);
            $status->update($request->all());
            return redirect()->route('status-solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Status atualizado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(StatusSolicitacao $status)
    {
        try{
            $status->delete();
            return redirect()->route('status-solicitacao.index')
                ->with('status', 'sucess')
                ->with('message', 'Status excluído com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}