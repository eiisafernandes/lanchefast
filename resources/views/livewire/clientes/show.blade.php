<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card com a visualização do cliente -->
            <div class="card shadow-lg border-light rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Detalhes do Cliente</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Nome:</h5>
                            <p class="font-weight-bold">{{ $cliente->nome }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">E-mail:</h5>
                            <p class="font-weight-bold">{{ $cliente->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Telefone:</h5>
                            <p class="font-weight-bold">{{ $cliente->telefone }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">CPF:</h5>
                            <p class="font-weight-bold">{{ $cliente->cpf }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5 class="text-muted">Endereço:</h5>
                            <p class="font-weight-bold">{{ $cliente->endereco }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">Senha:</h5>
                            <p class="font-weight-bold">********</p> <!-- Não exibe a senha real -->
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">Data de Cadastro:</h5>
                            <p class="font-weight-bold">{{ $cliente->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Botão de Voltar -->
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary rounded-pill shadow-sm">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
