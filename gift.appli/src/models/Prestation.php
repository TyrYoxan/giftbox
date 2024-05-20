<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model{
    protected $table = 'prestation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType='string';
    public $timestamp=false;


}