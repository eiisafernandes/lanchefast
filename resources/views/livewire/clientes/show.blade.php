<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card com sombra elegante -->
            <div class="card border-0 rounded-4 shadow-lg"> <!-- sombra adicionada -->
                <div class="card-header bg-gradient bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0">Informações do Cliente</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Nome:</label>
                            <div class="fw-semibold fs-5">{{ $cliente->nome }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">E-mail:</label>
                            <div class="fw-semibold fs-5">{{ $cliente->email }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="text-muted">Telefone:</label>
                            <div class="fw-semibold fs-5">{{ $cliente->telefone }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">CPF:</label>
                            <div class="fw-semibold fs-5">{{ $cliente->cpf }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="text-muted">Endereço:</label>
                            <div class="fw-semibold fs-5">{{ $cliente->endereco }}</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="text-muted">Senha:</label>
                            <div class="fw-semibold fs-5">********</div> <!-- Senha oculta -->
                        </div>
                    </div>

                    <!-- Botão de Voltar -->
                    <div class="text-center">
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary rounded-pill px-4">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
