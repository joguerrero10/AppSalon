<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "salon";
$port = 3306;
/*
try {
     $conn = new PDO("mysql:host=$servername;dbname=$databasename;port=$port", $username, $password);
     return $conn;
 } catch (PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
    }
*/


$db = mysqli_connect($servername, $username, $password, $databasename, $port);


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
