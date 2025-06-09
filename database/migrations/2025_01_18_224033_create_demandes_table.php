<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')->references('id')->on('salles')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nom');
            $table->string('telephone');
            $table->string('mail');
            $table->dateTime('datedebut');
            $table->dateTime('datefin');
            $table->time('heuredebut');
            $table->time('heurefin');
            $table->string('effectif');
            $table->string('motif');
            $table->enum('etat', ['En attente', 'Validée', 'Refusée'])->default('En attente');
            $table->enum('reçu', ['Non', 'Oui'])->default('Non');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
