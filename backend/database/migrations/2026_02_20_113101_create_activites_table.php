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
            $table->string('nom');
            $table->text('description');
            $table->enum('type',['veille','live-coding','brief','workshop','diebrifing','daily-standup']);
            $table->unsignedBigInteger('binome_id');
            $table->foreign('binome_id')
              ->references('user_id')
              ->on('students')
              ->cascadeOnDelete();
            $table->string('ressource')->nullable();
            $table->enum('etat',['abonnée', 'non abonné']);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();
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
