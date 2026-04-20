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
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->date('jour');
        $table->time('heure_debut')->default('09:00:00');
        $table->time('duree_retard')->nullable();
        $table->enum('type_absence', ['retard', 'absence'])->default('retard');
        $table->enum('status', ['pending', 'justifie', 'not_justifie'])->default('pending');
        $table->string('motif')->nullable();
        $table->string('justification')->nullable();
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

