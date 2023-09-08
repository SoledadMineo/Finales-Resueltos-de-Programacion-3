<!DOCTYPE html>
<html>
<head>
    <title>Generar Matriz</title>
</head>
<body>
    <h2>Generar Matriz</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el valor enviado desde carga_matriz.php
        $numero = $_POST['numero'];

        // Validar si el número es impar
        if ($numero % 2 != 0) {
            // Generar la matriz aquí con el número impar
            echo "Número impar válido: $numero<br>";

            // Por ejemplo, crearemos una matriz de tamaño $numero x $numero con valores de ejemplo
            echo "<table border='1'>";
            for ($i = 0; $i < $numero; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $numero; $j++) {
                    if($j == intval($numero/2)){
                        echo "<td>1</td>";
                    }else{
                        echo "<td>0</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "El número ingresado no es impar.";
        }
    }
    ?>

</body>
</html>
