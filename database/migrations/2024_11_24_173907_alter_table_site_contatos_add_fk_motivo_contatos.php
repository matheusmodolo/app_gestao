<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // Preenchendo a coluna motivo_contato_id com os valores existentes na coluna motivo_contato
        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        // Criação da FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            // Remover a coluna motivo_contato
            $table->dropColumn('motivo_contato');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Criar a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            // Remover a FK
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // Preenchendo a coluna motivo_contato com os valores existentes na coluna motivo_contato_id
        DB::statement('UPDATE site_contatos SET motivo_contatos = motivo_contato_id');

        // Removendo a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->droipColumn('motivo_contatos_id');
        });
    }
}
