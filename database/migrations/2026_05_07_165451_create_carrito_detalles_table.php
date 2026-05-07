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
        Schema::create('carrito_detalles', function (Blueprint $table) {

            $table->id('id_detalle');

            $table->foreignId('id_carrito')
                  ->references('id_carrito')
                  ->on('carritos')
                  ->onDelete('cascade');

            $table->foreignId('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade');

            $table->integer('cantidad');

            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_detalles');
    }
};
