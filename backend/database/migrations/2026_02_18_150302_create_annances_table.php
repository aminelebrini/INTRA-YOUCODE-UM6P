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
        Schema::create('annances', function (Blueprint $table) {
            $table->id();
            $table->titre();
            $table->text('description');
            $table->status();
            $table->enum('categorie',['cme','workshop','evenement','information']);
            $table->enum('cible', ['A1','A2','tout']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annances');
    }
};
