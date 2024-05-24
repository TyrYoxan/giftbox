<?php
namespace gift\appli\models;

class Box extends \Illuminate\Database\Eloquent\Model
{
 protected $table='box'; // la table associée
 protected $primaryKey='id' ; // nom de la PK
 protected $keyType='string' ; // type de la PK

 protected $fillable=['token','libelle','description','montant','kdo','message_kdo','statut'] ;
 public $timestamps=true ;

 public function createur(){
     return $this->belongsTo('gift\appli\models\User','createur_id');
 }

 public function prestations() {
    return $this->belongsToMany('gift\appli\models\Prestation',
    'box2presta',
   'box_id',
   'presta_id')
    ->withPivot( ['quantite'] );
    }
}
