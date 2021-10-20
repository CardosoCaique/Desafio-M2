<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')
                ->nullable();
            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos')
                ->onDelete('set null');
            $table->string('nome');
            $table->string('uf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('cidades');
    }
}
