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
        Schema::create('dividendos', function (Blueprint $table) {
            $table->id();
            $table->string('ativo_emitido', 100);
            $table->decimal('taxa');
            $table->string('relacionado',100);
            $table->string('rotulo', 100);
            $table->string('codigoISIN',100);
            $table->unsignedBigInteger('id_acao');
            $table->foreign('id_acao')->references('id')->on('acoes');
            $table->boolean("ativo")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividendos');
    }
};
