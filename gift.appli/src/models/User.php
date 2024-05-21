<?php
namespace gift\appli\models;

class User extends \Illuminate\Database\Eloquent\Model
{
 protected $table='user'; // la table associée
 protected $primaryKey='id' ; // nom de la PK
 protected $keyType='string' ; // type de la PK

 protected $fillable=['user_id','password','role'] ;
 public $timestamps=false ;

 public function boxs(){
     return $this->hasMany('gift\appli\models\box', 'createur_id');
 }
}
