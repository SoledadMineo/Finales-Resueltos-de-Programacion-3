<?php
include 'conexion.php';
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

// Consulta SQL SELECT
$sql = "SELECT usuario, clave FROM usuario";
$result = $conn->query($sql);
$encontrado = false;
if ($result->num_rows > 0) {
    // Iterar sobre los resultados
    while ($row = $result->fetch_assoc()) {
        if($row['usuario'] === $usuario && $row['clave'] === $clave){
            echo "<h2>Bienvenido " .$usuario. "</h2>";
            echo "<a href=abmUsuarios.php>Ir a lista de usuarios</a>";
            $encontrado = true;
            break;
        }
    } 
    if(!$encontrado){
        echo 'Usuario o claves incorrectas!';
    }
}

$conn->close();
?>

