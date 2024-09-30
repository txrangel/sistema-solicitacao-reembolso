<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\CabecalhoSolicitacaoController;
use App\Http\Controllers\ItemSolicitacaoController;
use App\Http\Controllers\StatusSolicitacaoController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/perfil/create', [PerfilController::class, 'create'])->name('perfil.create');
    Route::post('/perfil/store', [PerfilController::class, 'store'])->name('perfil.store');
    Route::get('/perfil/{id}/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/{id}/update', [PerfilController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil/{id}/destroy', [PerfilController::class, 'destroy'])->name('perfil.destroy');

    Route::get('/permissao', [PermissaoController::class, 'index'])->name('permissao.index');
    Route::get('/permissao/create', [PermissaoController::class, 'create'])->name('permissao.create');
    Route::post('/permissao/store', [PermissaoController::class, 'store'])->name('permissao.store');
    Route::get('/permissao/{id}/edit', [PermissaoController::class, 'edit'])->name('permissao.edit');
    Route::put('/permissao/{id}/update', [PermissaoController::class, 'update'])->name('permissao.update');
    Route::delete('/permissao/{id}/destroy', [PermissaoController::class, 'destroy'])->name('permissao.destroy');

    Route::get('/setor', [SetorController::class, 'index'])->name('setor.index');
    Route::get('/setor/create', [SetorController::class, 'create'])->name('setor.create');
    Route::post('/setor/store', [SetorController::class, 'store'])->name('setor.store');
    Route::get('/setor/{id}/edit', [SetorController::class, 'edit'])->name('setor.edit');
    Route::put('/setor/{id}/update', [SetorController::class, 'update'])->name('setor.update');
    Route::delete('/setor/{id}/destroy', [SetorController::class, 'destroy'])->name('setor.destroy');

    Route::get('/status-solicitacao', [StatusSolicitacaoController::class, 'index'])->name('status-solicitacao.index');
    Route::get('/status-solicitacao/create', [StatusSolicitacaoController::class, 'create'])->name('status-solicitacao.create');
    Route::post('/status-solicitacao/store', [StatusSolicitacaoController::class, 'store'])->name('status-solicitacao.store');
    Route::get('/status-solicitacao/{id}/edit', [StatusSolicitacaoController::class, 'edit'])->name('status-solicitacao.edit');
    Route::put('/status-solicitacao/{id}/update', [StatusSolicitacaoController::class, 'update'])->name('status-solicitacao.update');
    Route::delete('/status-solicitacao/{id}/destroy', [StatusSolicitacaoController::class, 'destroy'])->name('status-solicitacao.destroy');

    Route::get('/solicitacao', [CabecalhoSolicitacaoController::class, 'index'])->name('solicitacao.index');
    Route::get('/solicitacao/create', [CabecalhoSolicitacaoController::class, 'create'])->name('solicitacao.create');
    Route::post('/solicitacao/store', [CabecalhoSolicitacaoController::class, 'store'])->name('solicitacao.store');
    Route::get('/solicitacao/{id}/edit', [CabecalhoSolicitacaoController::class, 'edit'])->name('solicitacao.edit');
    Route::put('/solicitacao/{id}/update', [CabecalhoSolicitacaoController::class, 'update'])->name('solicitacao.update');
    Route::delete('/solicitacao/{id}/destroy', [CabecalhoSolicitacaoController::class, 'destroy'])->name('solicitacao.destroy');

    Route::get('/solicitacao/{id_solicitacao}/item/', [ItemSolicitacaoController::class, 'index'])->name('solicitacao.item.index');
    Route::get('/solicitacao/{id_solicitacao}/item/create', [ItemSolicitacaoController::class, 'create'])->name('solicitacao.item.create');
    Route::post('/solicitacao/{id_solicitacao}/item/store', [ItemSolicitacaoController::class, 'store'])->name('solicitacao.item.store');
    Route::get('/solicitacao/{id_solicitacao}/item/{id}/edit', [ItemSolicitacaoController::class, 'edit'])->name('solicitacao.item.edit');
    Route::put('/solicitacao/{id_solicitacao}/item/{id}/update', [ItemSolicitacaoController::class, 'update'])->name('solicitacao.item.update');
    Route::delete('/solicitacao/{id_solicitacao}/item/{id}/destroy', [ItemSolicitacaoController::class, 'destroy'])->name('solicitacao.item.destroy');
});

require __DIR__ . '/auth.php';