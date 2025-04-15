<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="bi bi-pencil-square me-2"></i> Editar Funcionário
        </h2>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body">
            <form wire:submit.prevent="atualizar">
                <div class="mb-3">
                    <label for="nome" class="form-label fw-semibold">Nome</label>
                    <input type="text" wire:model="nome" id="nome" class="form-control" placeholder="Digite o nome completo">
                    @error('nome') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label fw-semibold">CPF</label>
                    <input type="text" wire:model="cpf" id="cpf" class="form-control" placeholder="000.000.000-00">
                    @error('cpf') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" wire:model="email" id="email" class="form-control" placeholder="email@exemplo.com">
                    @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="senha" class="form-label fw-semibold">Nova Senha</label>
                    <input type="password" wire:model="senha" id="senha" class="form-control" placeholder="Deixe em branco para manter a atual">
                    @error('senha') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="bi bi-save2 me-1"></i> Atualizar Funcionário
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
