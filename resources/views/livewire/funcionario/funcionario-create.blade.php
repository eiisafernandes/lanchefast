<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold mb-0">
            <i class="bi bi-person-plus-fill me-2"></i> Novo Funcionário
        </h2>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-outline-secondary shadow-sm rounded-pill px-4">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body px-4 py-4 bg-light">
            <form wire:submit.prevent="salvar">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-semibold">Nome</label>
                        <input type="text" wire:model="nome" id="nome" class="form-control shadow-sm rounded-pill" placeholder="Digite o nome completo">
                        @error('nome') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="cpf" class="form-label fw-semibold">CPF</label>
                        <input type="text" wire:model="cpf" id="cpf" class="form-control shadow-sm rounded-pill" placeholder="000.000.000-00">
                        @error('cpf') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" wire:model="email" id="email" class="form-control shadow-sm rounded-pill" placeholder="email@exemplo.com">
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="senha" class="form-label fw-semibold">Senha</label>
                        <input type="password" wire:model="senha" id="senha" class="form-control shadow-sm rounded-pill" placeholder="Digite a senha">
                        @error('senha') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Cadastrar Funcionário
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
