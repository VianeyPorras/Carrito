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
        Schema::create('cliente_direccion', function (Blueprint $table) {

            $table->foreignId('id_cliente')
                  ->references('id_cliente')
                  ->on('clientes')
                  ->onDelete('cascade');

            $table->foreignId('id_direccion')
                  ->references('id_direccion')
                  ->on('direcciones')
                  ->onDelete('cascade');

            $table->string('tipo_direccion');

            $table->primary([
                'id_cliente',
                'id_direccion'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_direccion');
    }
};
