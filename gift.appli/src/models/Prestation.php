<?php
namespace gift\appli\models;

class Prestation extends \Illuminate\Database\Eloquent\Model
{
 protected $table='prestation'; // la table associée
 protected $primaryKey='id' ; // nom de la PK
 protected $keyType='string' ; // type de la PK

 protected $fillable=['libelle','description','url','unite','tarif','img'] ;
 public $timestamps=false ;

 public function categorie(){
     return $this->belongsTo('gift\appli\models\Categorie', 'cat_id');
 }

 public function boxs() {
    return $this->belongsToMany('gift\appli\models\Prestation',
    'box2presta',
   'presta_id',
   'box_id');
 }
}
