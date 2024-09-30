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
        $request->validate([
            'cabecalho_solicitacao_id' => 'required',
            'tipo_item_id' => 'required',
            'quantidade' => 'required|numeric',
            'valor_unitario' => 'required|numeric',
            'dentro_limite' => 'required|boolean',
        ]);

        ItemSolicitacao::create($request->all());

        return redirect()->route('solicitacoes.form', $request->cabecalho_solicitacao_id)
                         ->with('success', 'Item adicionado com sucesso.');
    }

    public function destroy(ItemSolicitacao $itemSolicitacao)
    {
        $itemSolicitacao->delete();
        return back()->with('success', 'Item excluído com sucesso.');
    }
}