<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;

class ProdutoShow extends Component
{
    public $produto;

    // O método 'mount' será chamado com o parâmetro 'id' passado pela URL
    public function mount($id)
    {
        // Busca o produto pelo ID
        $this->produto = Produto::findOrFail($id);
    }

    public function render()
    {
        // Retorna a view do produto show
        return view('livewire.produto.produto-show');
    }
}
