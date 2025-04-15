<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Aumentei de col-md-6 para col-md-8 -->
            <!-- Card com o formulário de edição -->
            <div class="card shadow-lg border-light rounded">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Editar Cliente</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="update">
                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" wire:model="nome" placeholder="Nome Completo">
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Endereço -->
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" wire:model="endereco" placeholder="Endereço completo">
                            @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Telefone -->
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" wire:model="telefone" placeholder="(XX) XXXXX-XXXX">
                            @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo CPF -->
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" wire:model="cpf" placeholder="XXX.XXX.XXX-XX">
                            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" wire:model="email" placeholder="exemplo@dominio.com">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Senha -->
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" wire:model="senha" placeholder="Senha">
                            @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Botões de Submit e Voltar -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-48 rounded-pill shadow-sm">Salvar Alterações</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary w-48 rounded-pill shadow-sm">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>