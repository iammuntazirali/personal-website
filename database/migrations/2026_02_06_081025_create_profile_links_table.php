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
        Schema::create('profile_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profile_id')
                ->constrained('profiles')
                ->onDelete('cascade');

            $table->enum('platform', [
                'codepen',
                'freecodecamp',
                'github',
                'hackthebox',
                'leetcode',
                'linkedin',
                'website',
                'other',
            ])->default('other');

            
            $table->text('url');
            $table->timestamps();

            // One link per platform per profile
            $table->unique(['profile_id', 'platform']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_links');
    }
};
