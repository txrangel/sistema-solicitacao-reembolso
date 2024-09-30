<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', compact('setores'));
    }
    public function create()
    {
        return view('setores.form');
    }
    public function edit(Setor $setor)
    {
        return view('setores.form', compact('setor'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate(['nome' => 'required']);
            Setor::create($request->all());
            return redirect()->route('setor.index')
                ->with('status', 'sucess')
                ->with('message', 'Setor criado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function update(Request $request, Setor $setor)
    {
        try{
            $request->validate(['nome' => 'required']);
            $setor->update($request->all());
            return redirect()->route('setor.index')
                ->with('status', 'sucess')
                ->with('message', 'Setor atualizado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(Setor $setor)
    {
        try{
            $setor->delete();
            return redirect()->route('setor.index')
                ->with('status', 'sucess')
                ->with('message', 'Setor excluído com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}