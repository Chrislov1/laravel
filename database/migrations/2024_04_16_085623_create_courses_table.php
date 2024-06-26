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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('point_depart');
            $table->string('point_arrivee');
            $table->string('date_heure');
            $table->unsignedBigInteger('chauffeur_id');
            $table->foreign('chauffeur_id') ->references('chauffeur_id') ->on('chauffeurs') ->onDelete('cascade');
            $table->enum('statut' ,['en cours', 'terminer'])->default('en cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
