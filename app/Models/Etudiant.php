<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model implements Authenticatable
{
    use HasFactory;

    protected $guard = 'etudiants';

    protected $fillable = [
        'nom',
        'prenom',
        'nom_ar',
        'prenom_ar',
        'date_naissance',
        'lieu_naissance',
        'lieu_naissance_ar',
        'provance_naissance',
        'sexe',
        'nationnalite',
        'situation_familiale',
        'situation_handicap',
        'enseignement_superieur',
        'universite_nom',
        'serie_bac',
        'type_etablissement',
        'mention_bac',
        'province_etablissement',
        'scan_bac',
        'relvi_note',
        'a_obtention_bac',
        'is_registered',
        'adresse1',
        'adresse2',
        'province',
        'pays',
        'email',
        'photo',
        'cin_et',
        'cm_ou_cne',
        'code_postal',
        'profession_pere',
        'profession_mere',
        'telephone',
        'telephone_mere',
        'telephone_pere',
        'cin_pere',
        'cin_mere',
        'vivre_pere',
        'vivre_mere',
        'pdf_et',
        'sport_individuels',
        'sports_collectifs',
        'culturelles_arts_plastiques',
        'culturelles_theatre',
        'culturelles_audiovisuel',
        'culturelles_echecs',
        'culturelles_ecriture',
    ];
    public function getAuthIdentifierName()
    {
        return 'id'; 
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password; 
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
