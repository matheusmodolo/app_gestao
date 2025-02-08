<?php

use App\Unidade;
use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            ['unidade' => 'UN', 'descricao' => 'Unidade'],
            ['unidade' => 'Kg', 'descricao' => 'Quilograma'],
            ['unidade' => 'm', 'descricao' => 'Metro'],
            ['unidade' => 'g', 'descricao' => 'Grama'],
            ['unidade' => 'L', 'descricao' => 'Litro']
        ];

        foreach ($unidades as $unidade) {
            if (!Unidade::where('unidade', $unidade['unidade'])->where('descricao', $unidade['descricao'])->exists()) {
                Unidade::create($unidade);
            }
        }
    }
}
