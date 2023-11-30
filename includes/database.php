<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "salon";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename;port=$port", $username, $password);
    return $conn;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
