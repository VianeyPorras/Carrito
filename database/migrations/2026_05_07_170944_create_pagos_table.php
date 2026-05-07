<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {

            $table->id('id_pago');

            $table->foreignId('id_pedido')
                  ->references('id_pedido')
                  ->on('pedidos')
                  ->onDelete('cascade');

            $table->decimal('monto', 10, 2);

            $table->date('fecha');

            $table->foreignId('id_metodo')
                  ->references('id_metodo')
                  ->on('metodo_pagos')
                  ->onDelete('cascade');

            $table->foreignId('id_estado')
                  ->references('id_estado')
                  ->on('estado_pagos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
