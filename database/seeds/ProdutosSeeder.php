<?php

use App\Produto;
use Illuminate\Database\Seeder;
use Database\Factories\ProdutoFactory;


class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produto::class, 15)->create();
    }
}
