<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $perPage = 10;


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];


    public function render()
    {
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
        ->orWhere('email', 'like', '%{$this->search}%')
        ->orWhere('cpf', 'like', '%{$this->search}%')
        ->paginate($this->perPage);

        return view('livewire.clientes.index', compact('clientes'));
    }

    public function delete($id)
    {
        Cliente::findorFail($id)->delete();
        session()->flash('message', 'Cliente deletado com sucesso.');
    }
}
