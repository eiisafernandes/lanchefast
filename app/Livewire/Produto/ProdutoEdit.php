<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithFileUploads;

class ProdutoEdit extends Component
{
    use WithFileUploads;

    public $produto_id;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $imagem_atual;

    // Defina as regras de validação
    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string|max:500',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // A imagem é opcional, mas se fornecida, precisa ser válida
    ];

    // Carrega o produto no componente
    public function mount($id)
    {
        $produto = Produto::findOrFail($id);
        
        $this->produto_id = $produto->id;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
        $this->imagem_atual = $produto->imagem; // Salva o caminho da imagem atual
    }

    // Função para salvar o produto
    public function save()
    {
        $this->validate();

        $produto = Produto::find($this->produto_id);
        $produto->nome = $this->nome;
        $produto->ingredientes = $this->ingredientes;
        $produto->valor = $this->valor;

        // Verifica se há uma nova imagem sendo enviada
        if ($this->imagem) {
            // Apaga a imagem antiga se houver
            if ($produto->imagem) {
                unlink(storage_path('app/public/' . $produto->imagem));
            }
            // Salva a nova imagem
            $imagemPath = $this->imagem->store('produtos', 'public');
            $produto->imagem = $imagemPath;
        } else {
            // Se nenhuma nova imagem for enviada, mantém a imagem atual
            $produto->imagem = $this->imagem_atual;
        }

        $produto->save();

        session()->flash('message', 'Produto atualizado com sucesso!');
        return redirect()->route('produtos.index');
    }

    // Renderiza a view
    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
