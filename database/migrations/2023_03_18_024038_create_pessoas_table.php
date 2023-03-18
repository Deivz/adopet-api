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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_responsavel');
            $table->string('cpf');
            $table->timestamps();

            $table->foreign('cod_responsavel')->references('id')->on('responsaveis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
