<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;
use gift\appli\models\User;

class Box extends Model{
    protected $table = 'box';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType='string';
    protected $fillable = ['token','libelle','description','montant','kdo','message_kdo','statut'];
    public $timestamps = true;

    public function createur(): \Illuminate\Database\Eloquent\Relations\BelongsTo{
        return $this->belongsTo(User::class, 'createur_id');
    }
}