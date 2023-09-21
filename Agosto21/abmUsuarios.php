<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name='buscarUsuario' id='buscarUsuario'>
        <input type="submit" value="Buscar" name="buscar" onclick="buscar()">
        <input type="submit" value="Mostrar Todos" name="mostrar" onclick="mostrar()">
    </form>
</body>

<?php
if (isset($_POST['buscar'])) {
    // Llamar a la función desde aquí
    buscar();
}
if (isset($_POST['mostrar'])) {
    // Llamar a la función desde aquí
    mostrar();
}

function mostrar()
{
    
    include 'conexion.php';
    // Consulta SQL SELECT
    $sql = "SELECT usuario, clave FROM usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Iterar sobre los resultados
        echo '<table border=1>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['usuario'] . '</td>';
            echo '<td>' . $row['clave'] . '</td>';
        }
        echo '</tr>';
        echo '</table>';
    }

    
    $conn->close();
}

function buscar()
{
    include 'conexion.php';

    $usuario = $_POST['buscarUsuario'];
    $sql = "SELECT usuario, clave FROM usuario WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Iterar sobre los resultados
        echo 'Usuario encontrado!';
        echo '<table border=1>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['usuario'] . '</td>';
            echo '<td>' . $row['clave'] . '</td>';
        }
        echo '</tr>';
        echo '</table>';
    } else {
        echo 'Usuario no encontrado';
    }
    $conn->close();
}


?>

</html>