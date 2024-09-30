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
        return view('permissoes.form');
    }
    public function edit(Permissao $permissao)
    {
        return view('permissoes.form', compact('permissao'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
            ]);
            Permissao::create($request->all());
            return redirect()->route('permissao.index')
                ->with('status', 'sucess')
                ->with('message', 'Permissão criada com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function update(Request $request, Permissao $permissao)
    {
        try{
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
            ]);
            $permissao->update($request->all());
            return redirect()->route('permissao.index')
                ->with('status', 'sucess')
                ->with('message', 'Permissão atualizada com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(Permissao $permissao)
    {
        try{
            $permissao->delete();
            return redirect()->route('permissao.index')
                ->with('status', 'sucess')
                ->with('message', 'Permissão excluída com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}