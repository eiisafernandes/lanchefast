<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;
use Livewire\WithPagination;

class FuncionarioIndex extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Funcionario::findOrFail($id)->delete();
        session()->flash('message', 'Funcionário excluído com sucesso!');
    }

    public function render()
    {
        $funcionarios = Funcionario::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('cpf', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);

        return view('livewire.funcionario.funcionario-index', [
            'funcionarios' => $funcionarios
        ]);
    }

}
