<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')
                ->nullable();
            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos')
                ->onDelete('set null');
            $table->string('identificaco');
            $table->text('descricao')
                ->nullable();
            $table->enum('status', ['ativo', 'inativo']);
            $table->timestamps();
        });

        Schema::create('descontos', function (Blueprint $table) {
            $table->id();
            $table->float('valor');
        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanhas');
        Schema::dropIfExists('produtos');
    }
}
