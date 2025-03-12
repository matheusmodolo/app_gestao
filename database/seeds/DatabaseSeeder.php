<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
        $this->call(ProdutosSeeder::class);
        $this->call(UnidadesSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}
