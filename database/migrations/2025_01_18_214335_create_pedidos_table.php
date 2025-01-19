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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido')->autoIncrement();
            $table->date('data_pedido')->nullable();
            $table->string('itens_do_pedido')->nullable();
            $table->decimal('valor_total_pedido', 8,2)->nullable();
            $table->string('status_pedido')->nullable();
            $table->string('endereço_entrega')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->decimal('custo_frete', 8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
