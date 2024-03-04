<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStatutFromEntreeSortieTable extends Migration
{
    public function up()
    {
        Schema::table('entree_sortie', function (Blueprint $table) {
            $table->dropColumn('statut');
        });
    }

    public function down()
    {
        Schema::table('entree_sortie', function (Blueprint $table) {
            $table->string('statut')->nullable();
        });
    }
}

