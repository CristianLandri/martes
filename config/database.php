<?php
// Configuración de la base de datos
$db_host = 'localhost';
$db_user = 'root';     // Cambia esto por tu usuario de MySQL
$db_pass = '';         // Cambia esto por tu contraseña de MySQL
$db_name = 'plv_db';

// Crear conexión
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>