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
    Schema::create('abscences', function (Blueprint $table) {
        $table->id();
        $table->time('heure_debut')->default('08:00:00'); 
        $table->time('duree_retard')->nullable();        
        $table->enum('status', ['justifie', 'non justifie']);
        $table->string('motif');
        $table->string('justification');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abscences');
    }
};
