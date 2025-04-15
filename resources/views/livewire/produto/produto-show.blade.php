<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <!-- Card com sombra e bordas arredondadas -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary bg-gradient text-white text-center py-4 rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-box-seam me-2"></i>Detalhes do Produto</h4>
                </div>

                <div class="card-body px-5 py-4">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="text-muted">Nome do Produto</label>
                            <div class="fs-5 fw-semibold">{{ $produto->nome }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Valor (R$)</label>
                            <div class="fs-5 fw-semibold">R$ {{ number_format($produto->valor, 2, ',', '.') }}</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="text-muted">Ingredientes</label>
                            <div class="fs-5 fw-semibold">{{ $produto->ingredientes }}</div>
                        </div>
                    </div>

                    <!-- Exibição da Imagem -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="text-muted">Imagem do Produto</label>
                            <div class="mt-3">
                                <img src="{{ Storage::url($produto->imagem) }}" alt="Imagem do Produto" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i> Voltar para Lista
                        </a>
                        
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning rounded-pill px-4">
                            <i class="bi bi-pencil-square me-2"></i> Editar Produto
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
