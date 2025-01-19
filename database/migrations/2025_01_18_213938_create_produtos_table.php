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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); 
            $table->string('image_path')->nullable();
            $table->string('nome_produto')->nullable();
            $table->string('descricao_produto')->nullable();
            $table->decimal('preco', 8, 2)->nullable();
            $table->foreignId('id_categoria')->constrained('categorias')->onDelete('cascade'); 
            $table->integer('qtd_estoque')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('image_path');
            $table->dropForeign(['id_categoria']);
            $table->dropColumn('id_categoria');
        });
        
        Schema::dropIfExists('produtos');
    }
};
