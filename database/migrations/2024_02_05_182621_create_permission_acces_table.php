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
        Schema::create('permission_acces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained();
            $table->foreignId('local_id')->constrained();
            $table->string('niveauAcces');
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_acces');
    }
};
