<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <!-- Card com sombra e bordas arredondadas -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary bg-gradient text-white text-center py-4 rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Produto</h4>
                </div>

                <div class="card-body px-5 py-4">

                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="save" enctype="multipart/form-data">

                        <!-- Nome do Produto -->
                        <div class="mb-4">
                            <label for="nome" class="form-label text-muted">Nome do Produto</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" id="nome" wire:model="nome" placeholder="Ex: X-Burger">
                            @error('nome') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Ingredientes -->
                        <div class="mb-4">
                            <label for="ingredientes" class="form-label text-muted">Ingredientes</label>
                            <textarea class="form-control rounded-3 shadow-sm" id="ingredientes" wire:model="ingredientes" rows="3" placeholder="Ex: Pão, carne, queijo, alface..."></textarea>
                            @error('ingredientes') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Valor -->
                        <div class="mb-4">
                            <label for="valor" class="form-label text-muted">Valor (R$)</label>
                            <input type="number" step="0.01" class="form-control rounded-3 shadow-sm" id="valor" wire:model="valor" placeholder="Ex: 19.90">
                            @error('valor') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Imagem -->
                        <div class="mb-4">
                            <label for="imagem" class="form-label text-muted">Imagem do Produto</label>
                            <input type="file" class="form-control rounded-3 shadow-sm" id="imagem" wire:model="imagem">
                            @error('imagem') <span class="text-danger small">{{ $message }}</span> @enderror

                            @if ($imagem_atual)
                                <div class="mt-3">
                                    <label class="text-muted">Imagem Atual:</label>
                                    <div>
                                        <img src="{{ Storage::url($imagem_atual) }}" alt="Imagem atual" class="img-thumbnail rounded shadow-sm" width="150">
                                    </div>
                                </div>
                            @endif

                            @if ($imagem)
                                <div class="mt-3">
                                    <label class="text-muted">Prévia da Nova Imagem:</label>
                                    <div>
                                        <img src="{{ $imagem->temporaryUrl() }}" alt="Imagem nova" class="img-thumbnail rounded shadow-sm" width="150">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Botões -->
                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>

                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-save me-1"></i>Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
