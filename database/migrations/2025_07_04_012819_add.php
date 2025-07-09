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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //ajouter la colonne 'description' apres la colonne taille à la table 'salles'
        Schema::table('salles', function (Blueprint $table) {
            $table->string('nombreplace')->nullable()->after('taille');
        });

    }
};
