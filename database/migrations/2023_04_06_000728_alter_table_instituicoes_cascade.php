<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('instituicoes', function (Blueprint $table) {
            $table->dropForeign(['cod_responsavel']);
            $table->foreignId('cod_responsavel')->constrained('responsaveis')->primary()->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::table('instituicoes', function (Blueprint $table) {
            $table->dropForeign(['cod_responsavel']);
            $table->foreignId('cod_responsavel')->constrained('responsaveis')->primary();
        });
    }
};