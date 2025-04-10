<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{

    public $nome, $endereco, $telefone, $cpf, $email, $senha;

    // Regras de validação para os campos
    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
        'cpf' => 'required|string|unique:clientes,cpf', // Certifique-se de validar o CPF
        'email' => 'required|email|unique:clientes,email',
        'senha' => 'required|string|min:8', // Para garantir que a senha seja confirmada
    ];

    // Função de salvar os dados
    public function save()
    {
        // Valida os dados conforme as regras definidas
        $this->validate();

        // Criptografa a senha antes de salvar no banco
        $this->senha = Hash::make($this->senha);

        // Cria o novo cliente no banco de dados
        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha,
        ]);

        // Mensagem de sucesso
        session()->flash('message', 'Cliente cadastrado com sucesso!');
        
        // Limpa os campos após o cadastro
        $this->reset();

        // Opcional: Você pode redirecionar ou fechar um modal aqui
    }
    
    public function render()
    {
        return view('livewire.clientes.create');
    }
}
