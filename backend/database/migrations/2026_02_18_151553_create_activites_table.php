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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->nom();
            $table->text('description');
            $table->enum('type',['veille','live-coding','brief','workshop','diebrifing','daily-standup']);
            $table->foreignId('binome_id')->constrained('students')->onDelete('cascade');
            $table->enum('status',['individuel','collective']);
            $table->ressource();
            $table->timestamps('date_debut');
            $table->timestamps('date_fin');
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
