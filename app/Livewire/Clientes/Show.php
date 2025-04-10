<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Show extends Component
{

    public $clienteId;
    public $cliente;

    // Método para carregar os dados do cliente
    public function mount($clienteId)
    {
        try {
            // Tenta encontrar o cliente pelo ID
            $this->cliente = Cliente::findOrFail($clienteId);
            $this->clienteId = $clienteId;
        } catch (ModelNotFoundException $e) {
            // Se o cliente não for encontrado, exibe um erro amigável
            session()->flash('error', 'Cliente não encontrado.');
            return redirect()->route('clientes.index');
        }
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
