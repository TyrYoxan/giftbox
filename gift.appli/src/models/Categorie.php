<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $fillable = ['libelle', 'description'];
    public $incrementing = false;
    public $keyType='string';
    public $timestamps = false;

}