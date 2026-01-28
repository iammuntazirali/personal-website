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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('profile_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('issuer_id')
                    ->constrained()
                    ->onDelete('cascade'); 

            $table->string('name');
            $table->text('description')->nullable();

            $table->date('date_awarded');
            $table->date('expiration_date')->nullable(); 

            $table->string('credential_link')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
