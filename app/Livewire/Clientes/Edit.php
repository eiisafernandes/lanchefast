<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Edit extends Component
{

    public $clienteId, $nome, $endereco, $telefone, $cpf, $email, $senha;

    public function mount($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);

        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->endereco = $cliente->endereco;
        $this->telefone = $cliente->telefone;
        $this->cpf = $cliente->cpf;
        $this->email = $cliente->email;
    }

    // ⬇️ Agora usamos um método para as regras de validação
    protected function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|unique:clientes,cpf,' . $this->clienteId,
            'email' => 'required|email|unique:clientes,email,' . $this->clienteId,
            'senha' => 'nullable|string|min:8',
        ];
    }

    public function update()
    {
        $this->validate();

        $cliente = Cliente::findOrFail($this->clienteId);

        $cliente->update([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha ? bcrypt($this->senha) : $cliente->senha,
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso!');
        return redirect()->route('clientes.index');
    }


    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
