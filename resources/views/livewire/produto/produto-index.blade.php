<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2 class="text-primary fw-bold">Produtos</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('produtos.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Novo Produto
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.debounce.300ms="search" 
                           class="form-control" placeholder="Digite o nome ou ingrediente...">
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
                <div class="col-md-3 text-end align-self-center">
                    <span class="text-muted small">Total: {{ $produtos->total() }} produtos</span>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Ingredientes</th>
                            <th class="text-end">Valor</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produtos as $produto)
                            <tr>
                                <td>
                                    @if($produto->imagem)
                                        <img src="{{ asset('storage/' . $produto->imagem) }}" width="50" class="rounded">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->ingredientes }}</td>
                                <td class="text-end">
                                    <i class="bi bi-cash-coin text-success"></i>
                                    {{ number_format($produto->valor, 2, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    <!-- Botão Visualizar -->
                                    <a href="{{ route('produtos.show', $produto->id) }}"
                                       class="btn btn-outline-info btn-sm"
                                       data-bs-toggle="tooltip"
                                       title="Visualizar">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                
                                    <!-- Botão Editar -->
                                    <a href="{{ route('produtos.edit', $produto->id) }}"
                                       class="btn btn-outline-warning btn-sm"
                                       data-bs-toggle="tooltip"
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                
                                    <!-- Botão Excluir com tooltip manual e modal -->
                                    <button class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="tooltip"
                                            title="Excluir"
                                            onclick="var myModal = new bootstrap.Modal(document.getElementById('confirmDelete{{ $produto->id }}')); myModal.show();">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                
                                    <!-- Modal de confirmação -->
                                    <div class="modal fade" id="confirmDelete{{ $produto->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <p class="mb-2">Deseja excluir <strong>{{ $produto->nome }}</strong>?</p>
                                                    <div class="d-flex justify-content-around">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                        <button wire:click="delete({{ $produto->id }})" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Excluir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Nenhum produto encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $produtos->links() }}
            </div>
        </div>
    </div>

    <script>
        // Ativa tooltips
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</div>
