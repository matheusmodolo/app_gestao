<?php

use App\MotivoContato;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato', 30);
            $table->timestamps();
        });

        // MotivoContato::create(['motivo_contato' => 'Duvida']);
        // MotivoContato::create(['motivo_contato' => 'Elogio']);
        // MotivoContato::create(['motivo_contato' => 'Reclamação']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_contatos');
    }
}
