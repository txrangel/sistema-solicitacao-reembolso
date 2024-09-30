<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfis = Perfil::all();
        return view('perfis.index', compact('perfis'));
    }
    public function create()
    {
        return view('perfis.form');
    }
    public function edit(Perfil $perfil)
    {
        return view('perfis.form', compact('perfil'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate(['nome' => 'required']);
            Perfil::create($request->all());
            return redirect()->route('perfil.index')
                ->with('status', 'sucess')
                ->with('message', 'Perfil criado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function update(Request $request, Perfil $perfil)
    {
        try{
            $request->validate(['nome' => 'required']);
            $perfil->update($request->all());
            return redirect()->route('perfil.index')
                ->with('status', 'sucess')
                ->with('message', 'Perfil atualizado com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(Perfil $perfil)
    {
        try{
            $perfil->delete();
            return redirect()->route('perfil.index')
                ->with('status', 'sucess')
                ->with('message', 'Perfil excluído com sucesso.');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Erro: '. $e->getMessage())
                ->withInput();
        }
    }
}