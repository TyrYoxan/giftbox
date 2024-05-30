<?php
namespace gift\appli\core\domaine\entities;

class Categorie extends \Illuminate\Database\Eloquent\Model
{
 protected $table='categorie'; // la table associée
 protected $primaryKey='id' ; // nom de la PK

 protected $fillable=['libelle','description'] ;
 public $timestamps=false ;

 public function prestations(){
    return $this->hasMany('gift\appli\core\domaine\entities\Prestation', 'cat_id');
}
}
