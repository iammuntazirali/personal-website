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
        Schema::create('certificate_spoken_language', function (Blueprint $table) {
            $table->id();

            $table->foreignId('certificate_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('spoken_language_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['certificate_id', 'spoken_language_id'], 'cert_lang_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_spoken_language');
    }
};
