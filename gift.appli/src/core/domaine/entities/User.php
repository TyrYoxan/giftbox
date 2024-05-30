<?php
namespace gift\appli\core\domaine\entities;

class User extends \Illuminate\Database\Eloquent\Model
{
 protected $table='user'; // la table associée
 protected $primaryKey='id' ; // nom de la PK
 protected $keyType='string' ; // type de la PK

 protected $fillable=['user_id','password','role'] ;
 public $timestamps=false ;

 public function boxs(){
     return $this->hasMany('gift\appli\core\domaine\entities\Box', 'createur_id');
 }
}
