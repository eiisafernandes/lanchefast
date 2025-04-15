<div class="container mt-4">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-0"><i class="bi bi-people-fill me-2"></i>Clientes</h2>
            <small class="text-muted">Gerencie todos os seus clientes cadastrados.</small>
        </div>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Novo Cliente
        </a>
    </div>

    <!-- Card da tabela -->
    <div class="card shadow-sm">
        <div class="card-body">
            
            <!-- Filtros -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group rounded shadow-sm">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" wire:model.debounce.300ms="search" class="form-control border-start-0"
                            placeholder="Buscar clientes...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select rounded shadow-sm">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            <!-- Mensagem de sucesso -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Tabela -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td class="text-center">
                                    <a href="{{ route('clientes.show', $cliente->id) }}"
                                       class="btn btn-sm btn-outline-info me-1"
                                       data-bs-toggle="tooltip"
                                       title="Visualizar">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}"
                                       class="btn btn-sm btn-outline-warning me-1"
                                       data-bs-toggle="tooltip"
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Botão Excluir com tooltip manual e modal -->
                                    <button class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="tooltip"
                                            title="Excluir"
                                            onclick="var myModal = new bootstrap.Modal(document.getElementById('confirmDelete{{ $cliente->id }}')); myModal.show();">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                
                                    <!-- Modal de confirmação -->
                                    <div class="modal fade" id="confirmDelete{{ $cliente->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <p class="mb-2">Deseja excluir <strong>{{ $cliente->nome }}</strong>?</p>
                                                    <div class="d-flex justify-content-around">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                        <button wire:click="delete({{ $cliente->id }})" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Excluir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Nenhum cliente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            <div class="mt-3">
                {{ $clientes->links() }}
            </div>

        </div>
    </div>
</div>