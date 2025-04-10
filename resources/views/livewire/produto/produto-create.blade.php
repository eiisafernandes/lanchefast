<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Aumentei de col-md-6 para col-md-8 -->
            <!-- Card com o formulário de criação do produto -->
            <div class="card shadow-lg border-light rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Cadastro de Produto</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="nome" wire:model="nome" placeholder="Nome do Produto">
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Ingredientes -->
                        <div class="mb-3">
                            <label for="ingredientes" class="form-label">Ingredientes</label>
                            <textarea class="form-control" id="ingredientes" wire:model="ingredientes" rows="3" placeholder="Ingredientes do produto"></textarea>
                            @error('ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Valor -->
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor (R$)</label>
                            <input type="number" step="0.01" class="form-control" id="valor" wire:model="valor" placeholder="Valor do Produto">
                            @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Imagem -->
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem do Produto</label>
                            <input type="file" class="form-control" id="imagem" wire:model="imagem">
                            @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror

                            @if ($imagem)
                                <div class="mt-3">
                                    <img src="{{ $imagem->temporaryUrl() }}" alt="Imagem do produto" class="img-thumbnail" width="150">
                                </div>
                            @endif
                        </div>

                        <!-- Botão de Submit -->
                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Cadastrar Produto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
