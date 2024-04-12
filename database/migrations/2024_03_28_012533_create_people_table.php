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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->jsonb('atuacao')->nullable();
            $table->jsonb('formacao')->nullable();
            $table->jsonb('idiomas')->nullable();
            $table->string('lattesDataAtualizacao');
            $table->string('lattesID10');
            $table->string('nacionalidade');
            $table->string('name');
            $table->string('nomeCitacoesBibliograficas');
            $table->string('orcid');
            $table->longText('resumoCVpt');
            $table->longText('resumoCVen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};