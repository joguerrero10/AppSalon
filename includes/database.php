<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "blackninja";
$port = 3306;

try {
    $db = new PDO("mysql:host=$servername;dbname=$databasename;port=$port", $username, $password);
    return $db;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
