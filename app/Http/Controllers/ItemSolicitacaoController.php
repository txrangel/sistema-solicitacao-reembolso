<?php

namespace App\Http\Controllers;

use App\Models\ItemSolicitacao;
use App\Models\CabecalhoSolicitacao;
use App\Models\TipoItemSolicitacao;
use Illuminate\Http\Request;

class ItemSolicitacaoController extends Controller
{
    public function create(CabecalhoSolicitacao $solicitacao)
    {
        $tipos = TipoItemSolicitacao::all();
        return view('itens.form', compact('solicitacao', 'tipos'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'cabecalho_solicitacao_id' => 'required',
                'tipo_item_id' => 'required',
                'quantidade' => 'required|numeric',
                'valor_unitario' => 'required|numeric',
                'dentro_limite' => 'required|boolean',
            ]);
            ItemSolicitacao::create($request->all());
            return redirect()->route('solicitacao.form', $request->cabecalho_solicitacao_id)
                ->with('status', 'sucess')
                ->with('message', 'Item adicionado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(ItemSolicitacao $itemSolicitacao)
    {
        try{
            $itemSolicitacao->delete();
            return back()
                ->with('status', 'sucess')
                ->with('message', 'Item excluído com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}