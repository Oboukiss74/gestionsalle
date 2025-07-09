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
        //
        //mettre a jour la table 'salles' en ajoutant la colonne nombreplace apres la colonne taille à la table 'salles'
        Schema::table('demandes', function (Blueprint $table) {
            $table->string('demandeur')->nullable()->after('nom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
