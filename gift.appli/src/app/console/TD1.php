<?php

namespace gift\appli\app\console;

require_once '../../vendor/autoload.php';

use gift\appli\models\Prestation;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection( parse_ini_file('../../conf/gift.db.conf.ini.dist'));
$db->setAsGlobal();
$db->bootEloquent();

$prestations = Prestation::all();

foreach ($prestations as $prestation) {
    echo $prestation->libelle . ' | ' . $prestation->description . ' | '. $prestation->tarif . ' | ' . $prestation->unite . "\n";
}

