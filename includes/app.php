<?php 
require 'database.php';
require 'funciones.php';

require __DIR__ . '/../vendor/autoload.php';


// Conectarnos a la base de datos
use Model\ActiveRecord;
ActiveRecord::setDB($db);


