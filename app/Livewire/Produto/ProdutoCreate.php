<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProdutoCreate extends Component
{

    use WithFileUploads; // Habilita o upload de arquivos

    public $nome, $ingredientes, $valor, $imagem; // Campos públicos para o formulário

    // Regras de validação
    protected $rules = [
        'nome' => 'required|string|max:255',
        'ingredientes' => 'required|string|max:500',
        'valor' => 'required|numeric|min:0.01', // Garantir que o valor seja positivo
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', // Limite de 1MB para a imagem
    ];

    // Método para salvar o produto
    public function save()
    {
        // Valida os campos do formulário com base nas regras definidas
        $this->validate();

        // Armazenando a imagem no diretório "produtos"
        $imagemUrl = $this->imagem->store('produtos', 'public');

        // Criação do novo produto no banco de dados
        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemUrl, // Caminho da imagem armazenada
        ]);

        // Mensagem de sucesso
        session()->flash('message', 'Produto cadastrado com sucesso!');

        // Limpar os campos após salvar
        $this->reset();
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
