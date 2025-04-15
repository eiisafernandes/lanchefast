<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <div>
            <h2 class="fw-bold text-primary mb-0"><i class="bi bi-people-fill me-2"></i>Funcionários</h2>
            <small class="text-muted">Gerencie todos os seus funcionários cadastrados.</small>
        </div>
        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Novo Funcionário
        </a>
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-md-6 position-relative">
                    <input type="text" wire:model.debounce.300ms="search" class="form-control ps-5"
                        placeholder="Buscar funcionários...">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                </div>
                <div class="col-md-3 ms-auto">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($funcionarios as $funcionario)
                            <tr>
                                <td>{{ $funcionario->nome }}</td>
                                <td>{{ $funcionario->cpf }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('funcionarios.show', $funcionario->id) }}"
                                       class="btn btn-sm btn-outline-info me-1" data-bs-toggle="tooltip" title="Visualizar">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                       class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="tooltip" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <!-- Botão Excluir com tooltip manual e modal -->
                                    <button class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="tooltip"
                                            title="Excluir"
                                            onclick="var myModal = new bootstrap.Modal(document.getElementById('confirmDelete{{ $funcionario->id }}')); myModal.show();">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                
                                    <!-- Modal de confirmação -->
                                    <div class="modal fade" id="confirmDelete{{ $funcionario->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <p class="mb-2">Deseja excluir <strong>{{ $funcionario->nome }}</strong>?</p>
                                                    <div class="d-flex justify-content-around">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                        <button wire:click="delete({{ $funcionario->id }})" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Excluir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Nenhum funcionário encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $funcionarios->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
</div>
