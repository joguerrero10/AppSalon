<?php
$servername = "localhost";
$username = "root";
$password = ""; // Si la contraseña está vacía, déjala así

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // Establecer el modo de error de PDO en excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
