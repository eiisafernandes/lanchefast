<?php

use App\Livewire\Funcionario\FuncionarioCreate;
use App\Livewire\Funcionario\FuncionarioEdit;
use App\Livewire\Funcionario\FuncionarioIndex;
use App\Livewire\Funcionario\FuncionarioShow;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use App\Livewire\Produto\ProdutoShow;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function () {
    Route::get('/', \App\Livewire\Clientes\Index::class)->name('clientes.index');
    Route::get('/create', \App\Livewire\Clientes\Create::class)->name('clientes.create');
    Route::get('/{clienteId}', \App\Livewire\Clientes\Show::class)->name('clientes.show');
    Route::get('/{clienteId}/edit', App\Livewire\Clientes\Edit::class)->name('clientes.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produtos.index');
    Route::get('/create', ProdutoCreate::class)->name('produtos.create');
    Route::get('/{id}', ProdutoShow::class)->name('produtos.show');
    Route::get('/{id}/edit', ProdutoEdit::class)->name('produtos.edit');
});

Route::prefix('funcionarios')->group(function () {
    Route::get('/', FuncionarioIndex::class)->name('funcionarios.index');
    Route::get('/create', FuncionarioCreate::class)->name('funcionarios.create');
    Route::get('/{id}', FuncionarioShow::class)->name('funcionarios.show');
    Route::get('/{id}/edit', FuncionarioEdit::class)->name('funcionarios.edit');
});
