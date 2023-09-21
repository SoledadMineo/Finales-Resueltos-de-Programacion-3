<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto C</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="catedra">Cátedras:</label>
    <select id="catedra" name="catedra">
        <?php
            include 'conexion.php';
            $sql = "SELECT codigo, descripcion FROM catedra";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["codigo"]."'>".$row["descripcion"]."</option>";
                }
            } else {
                echo "No se encontraron cátedras.";
            }
        ?>
    </select>   
    <br> 
    <input type="submit" value="Buscar" name="buscar" id="buscar">
    <br>
    <?php
        if (isset($_POST['buscar'])) {
        // Llamar a la función desde aquí
            mostrarAlumnos();
        }
        
        function mostrarAlumnos(){
            include 'conexion.php';
            $codigo = $_POST['catedra'];
            $sql = "SELECT catedra_alumno.codigoCatedra, catedra.descripcion, alumno.nombre, alumno.apellido
            FROM ((catedra_alumno
            INNER JOIN catedra ON catedra_alumno.codigoCatedra=catedra.codigo)
            INNER JOIN alumno ON catedra_alumno.legajoAlumno= alumno.legajo)
            WHERE catedra_alumno.codigoCatedra = $codigo;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table border=1>';
               
                echo  '<th>Código Cátedra</th>';
                echo  '<th>Cátedra</th>';
                echo  '<th>Nombre Alumno</th>';
                echo  '<th>Apellido Alumno</th>';

                while ($row = $result->fetch_assoc()) {
                    
                    echo '<tr>'.'<td>'.$row["codigoCatedra"].'</td>'.'<td>'.$row['descripcion'].'</td>'.'<td>'.$row['nombre'].'</td>'.'<td>'.$row['apellido'].'</td>'.'</tr>';
                    //echo "<option value='".$row["codigoCatedra"]."'>".$row["descripcion"].$row["nombre"]."'>".$row["apellido"]."</option>";
                    
                }

                echo '</table>';
            } else {
                echo "No se encontraron alumnos.";
            }

        }
            
    ?>
    
    </form>
    
</body>
</html>