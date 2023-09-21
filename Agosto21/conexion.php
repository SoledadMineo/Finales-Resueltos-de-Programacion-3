<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "usuario";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 

?>