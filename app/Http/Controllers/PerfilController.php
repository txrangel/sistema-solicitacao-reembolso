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

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required']);
        Perfil::create($request->all());

        return redirect()->route('perfil.index')->with('success', 'Perfil criado com sucesso.');
    }

    public function edit(Perfil $perfil)
    {
        return view('perfis.form', compact('perfil'));
    }

    public function update(Request $request, Perfil $perfil)
    {
        $request->validate(['nome' => 'required']);
        $perfil->update($request->all());

        return redirect()->route('perfil.index')->with('success', 'Perfil atualizado com sucesso.');
    }

    public function destroy(Perfil $perfil)
    {
        $perfil->delete();
        return redirect()->route('perfil.index')->with('success', 'Perfil excluído com sucesso.');
    }
}