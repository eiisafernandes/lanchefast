<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Cliente Exemplo 1',
            'endereco' => 'Rua Exemplo, 123',
            'telefone' => '645376837684',
            'cpf' => '11122233345',
            'email' => 'clienteex1@example.com',
            'senha' => bcrypt('senha123')
        ]);

        Cliente::create([
            'nome' => 'Cliente Exemplo 2',
            'endereco' => 'Rua Exemplo, 123',
            'telefone' => '11192633355',
            'cpf' => '1112248793',
            'email' => 'cliente2@example.com',
            'senha' => bcrypt('senha123')
        ]);
    }
}
