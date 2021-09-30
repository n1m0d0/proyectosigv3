<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');
            $table->unsignedBigInteger('contract_id');
            $table->date('fecha_inicio');
            $table->integer('dias');
            $table->float('descuentos', 10, 2);
            $table->float('bonificaciones', 10, 2);
            $table->string('estado')->default('ACTIVO');
            $table->timestamps();

            $table->foreign('petition_id')->references('id')->on('petitions');
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
