<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FuncionarioCreate extends Component
{

    public $nome, $cpf, $email, $senha;

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:funcionarios,cpf',
            'email' => 'required|email|unique:funcionarios,email',
            'senha' => 'required|min:6',
        ]);

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        session()->flash('message', 'Funcionário cadastrado com sucesso!');
        return redirect()->route('funcionarios.index');
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-create');
    }
}
