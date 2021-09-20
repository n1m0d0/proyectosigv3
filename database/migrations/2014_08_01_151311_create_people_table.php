<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('paterno');
            $table->string('materno');
            $table->string('ci')->nullable();
            $table->enum('expedido', [
                'CH',
                'LP',
                'CB',
                'OR',
                'PT',
                'TJ',
                'SC',
                'BE',
                'PD'
            ])->nullable();
            $table->enum('genero', [
                'H',
                'M'
            ])->nullable();
            $table->date('nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('direccion')->nullable();
            $table->enum('estado_civil', [
                'Soltero',
                'Casado',
                'Viudo',
                'Divorciado'
            ])->nullable();
            $table->boolean('hijos')->nullable();
            $table->boolean('discapacidad')->nullable();
            $table->enum('tipo_discapacidad', [
                'Físico',
                'Motora',
                'Intelectual',
                'Auditiva',
                'Visual',
                'Mental/psíquica',
                'Múltiple'
            ])->nullable();
            $table->string('certificado_discapacidad')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('step')->default(1);
            $table->boolean('validacion_segip')->default(0);
            $table->string('estado')->default("REGISTRADO");
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
