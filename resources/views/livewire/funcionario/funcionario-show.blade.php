<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="bi bi-person-badge me-2"></i> Detalhes do Funcionário
        </h2>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nome</label>
                <div class="form-control bg-light">{{ $funcionario->nome }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">CPF</label>
                <div class="form-control bg-light">{{ $funcionario->cpf }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="form-control bg-light">{{ $funcionario->email }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Criado em</label>
                <div class="form-control bg-light">{{ $funcionario->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Atualizado em</label>
                <div class="form-control bg-light">{{ $funcionario->updated_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
    </div>
</div>
