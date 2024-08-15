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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nom_ar')->nullable();
            $table->string('prenom_ar')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('lieu_naissance_ar')->nullable();
            $table->string('province_naissance')->nullable();
            $table->string('sexe')->nullable();
            $table->string('nationnalite')->nullable();
            $table->string('situation_familiale')->nullable();
            $table->string('situation_handicap')->nullable();
            $table->string('enseignement_superieur')->nullable();
            $table->string('universite_nom')->nullable();
            $table->string('serie_bac')->nullable();
            $table->string('type_etablissement')->nullable();
            $table->string('mention_bac')->nullable();
            $table->string('province_etablissement')->nullable();
            $table->string('scan_bac')->nullable();
            $table->string('relvi_note')->nullable();
            $table->string('a_obtention_bac')->nullable();
            $table->boolean('is_registered')->default(false);
            $table->string('adresse1')->nullable();
            $table->string('adresse2')->nullable();
            $table->string('province')->nullable();
            $table->string('pays')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('cin_et')->nullable();
            $table->string('cm_ou_cne')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('telephone')->nullable();
            $table->string('telephone_mere')->nullable();
            $table->string('telephone_pere')->nullable();
            $table->string('cin_pere')->nullable();
            $table->string('cin_mere')->nullable();
            $table->string('vivre_pere')->nullable();
            $table->string('vivre_mere')->nullable();
            $table->string('password');

            $table->string('pdf_et')->nullable();
            $table->string('sport_individuels')->nullable();
            $table->string('sports_collectifs')->nullable();
            $table->string('culturelles_arts_plastiques')->nullable();
            $table->string('culturelles_theatre')->nullable();
            $table->string('culturelles_audiovisuel')->nullable();
            $table->string('culturelles_echecs')->nullable();
            $table->string('culturelles_ecriture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
