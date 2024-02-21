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
        Schema::create('entree_sortie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('local_id')->constrained();
            $table->dateTime('date_et_heure_entree');
            $table->dateTime('date_et_heure_sortie')->nullable();
            $table->string('jour_de_la_semaine');
            $table->string('statut'); // Entrée ou Sortie
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entree_sortie');
    }
};
