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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->jsonb('about')->nullable();
            $table->jsonb('author')->nullable();
            $table->jsonb('author_array')->nullable();
            $table->jsonb('authorLattesIds')->nullable();
            $table->string('bookEdition')->nullable();
            $table->string('country')->nullable();
            $table->string('datePublished')->nullable();
            $table->string('doi')->nullable();
            $table->jsonb('educationEvent')->nullable();
            $table->longText('educationEventName')->nullable();
            $table->jsonb('genero')->nullable();
            $table->string('inLanguage')->nullable();
            $table->jsonb('isPartOf')->nullable();
            $table->string('isPartOfName')->nullable();
            $table->string('isbn')->nullable();
            $table->jsonb('instituicao')->nullable();
            $table->string('issn')->nullable();
            $table->string('issueNumber')->nullable();
            $table->longText('name');
            $table->string('numberOfPages')->nullable();
            $table->string('pageEnd')->nullable();
            $table->string('pageStart')->nullable();
            $table->jsonb('ppg_nome')->nullable();
            $table->jsonb('publisher')->nullable();
            $table->string('qualis')->nullable();
            $table->string('sha256');
            $table->string('type');
            $table->longText('url')->nullable();
            $table->string('volumeNumber')->nullable();
            $table->timestamps();

            $table->index([
                'about', 'author', 'author_array', 'authorLattesIds', 'datePublished', 'doi', 'educationEvent', 'educationEventName', 'genero', 'inLanguage', 'isPartOf', 'isPartOfName', 'isbn', 'instituicao', 'issn', 'name', 'ppg_nome', 'publisher', 'type'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};