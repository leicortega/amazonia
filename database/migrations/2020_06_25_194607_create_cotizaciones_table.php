<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();

            $table->string('num_cotizacion')->unique();
            $table->datetime('fecha');
            $table->string('nombre');
            $table->string('correo');
            $table->bigInteger('telefono')->nullable();
            $table->string('departamento_origen');
            $table->string('ciudad_origen');
            $table->string('departamento_destino');
            $table->string('ciudad_destino');
            $table->date('fecha_ida');
            $table->date('fecha_regreso');
            $table->string('tipo_servicio');
            $table->string('tipo_vehiculo');
            $table->enum('recorrido', ['Solo ida', 'Ida y vuelta']);
            $table->longText('descripcion')->nullable();
            $table->longText('observaciones')->nullable();
            $table->enum('combustible', ['Si', 'No'])->nullable();
            $table->enum('conductor', ['Si', 'No'])->nullable();
            $table->enum('peajes', ['Si', 'No'])->nullable();
            $table->enum('cotizacion_por', ['Dias', 'Trayecto', 'Mensual'])->nullable();
            $table->bigInteger('valor_unitario')->nullable();
            $table->integer('cantidad')->nullable();
            $table->bigInteger('total')->nullable();
            $table->longText('trayecto_dos')->nullable();
            $table->enum('aceptada', [0, 1])->nullable();
            $table->bigInteger('responsable_id')->nullable();

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
        Schema::dropIfExists('cotizaciones');
    }
}
