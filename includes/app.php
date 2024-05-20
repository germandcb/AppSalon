<?php 

use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';
$doctenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$doctenv->safeLoad();

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);