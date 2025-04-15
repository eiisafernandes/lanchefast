<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FuncionarioEdit extends Component
{

    public $funcionarioId;
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    public function mount($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $this->funcionarioId = $funcionario->id;
        $this->nome = $funcionario->nome;
        $this->cpf = $funcionario->cpf;
        $this->email = $funcionario->email;
    }

    public function atualizar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:funcionarios,cpf,' . $this->funcionarioId,
            'email' => 'required|email|max:255|unique:funcionarios,email,' . $this->funcionarioId,
            'senha' => 'nullable|min:6',
        ]);

        $funcionario = Funcionario::findOrFail($this->funcionarioId);
        $funcionario->nome = $this->nome;
        $funcionario->cpf = $this->cpf;
        $funcionario->email = $this->email;

        if (!empty($this->senha)) {
            $funcionario->senha = Hash::make($this->senha);
        }

        $funcionario->save();

        session()->flash('message', 'Funcionário atualizado com sucesso!');
        return redirect()->route('funcionarios.index');
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-edit');
    }
}
