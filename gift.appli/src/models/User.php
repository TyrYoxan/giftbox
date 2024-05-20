<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType='string';
    protected $fillable = ['user_id','password','role'];
    public $timestamps = false;



}