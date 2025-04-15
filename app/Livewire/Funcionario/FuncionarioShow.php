<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;

class FuncionarioShow extends Component
{

    public $funcionario;

    // O método 'mount' será chamado com o parâmetro 'id' passado pela URL
    public function mount($id)
    {
        // Busca o funcionário pelo ID
        $this->funcionario = Funcionario::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-show');
    }
}
