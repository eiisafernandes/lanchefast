<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcionario::create([
            'nome' => 'Ana Carolina',
            'cpf' => '123.456.789-00',
            'email' => 'ana@exemplo.com',
            'senha' => Hash::make('12345678')
        ]);

        Funcionario::create([
            'nome' => 'Isa Fernandes',
            'cpf' => '111.222.333-44',
            'email' => 'isa@exemplo.com',
            'senha' => Hash::make('12345678')
        ]);
    }
}
