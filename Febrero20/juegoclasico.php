<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto C - Final Febrero 2020</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <th>JUG 1 = <span id="cont1"></span></th>
            <th>JUG 2 = <span id="cont2"></span></th>
        </table>
        <table border="1">
            <tr>
                <th colspan="2">JUGADOR 1</th>
                <th colspan="2">JUGADOR 2</th>
            </tr>
            <tr>
                <td><input type="radio" name="jug1" value="piedra"></td>
                <td>PIEDRA</td>
                <td><input type="radio" name="jug2" value="piedra"></td>
                <td>PIEDRA</td>
            </tr>
            <tr>
                <td><input type="radio" name="jug1" value="papel"></td>
                <td>PAPEL</td>
                <td><input type="radio" name="jug2" value="papel"></td>
                <td>PAPEL</td>
            </tr>
            <tr>
                <td><input type="radio" name="jug1" value="tijera"></td>
                <td>TIJERA</td>
                <td><input type="radio" name="jug2" value="tijera"></td>
                <td>TIJERA</td>
            </tr>
        </table>
        <br>
        <input type="submit" name="jugada_php" value="JUGAR">
        <div id='mostrarResultado'></div>
    </form>
</body>
<?php
session_start();
if (empty($_SESSION['contador1']) && empty($_SESSION['contador2'])) {
    $_SESSION['contador1'] = 0;
    $_SESSION['contador2'] = 0;
}


if (isset($_POST['jugada_php'])) {
    jugada();
}

function jugada()
{
    if (isset($_POST['jug1']) && isset($_POST['jug2'])) {
        $jug1 = $_POST['jug1'];
        $jug2 = $_POST['jug2'];

        switch ($jug1) {
            case 'piedra':
                if ($jug2 == 'piedra') {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada Empatada!';</script>";
                    break;
                } else if ($jug2 == 'papel') {
                    $_SESSION['contador2']++;
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 2!';</script>";
                    break;
                } else {
                    $_SESSION['contador1']++;
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 1!';</script>";
                    break;
                }
            case 'papel':
                if ($jug2 == 'piedra') {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 1!';</script>";
                    $_SESSION['contador1']++;
                    break;
                } else if ($jug2 == 'papel') {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada empatada!';</script>";
                    break;
                } else {
                    $_SESSION['contador2']++;
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 2!';</script>";
                    break;
                }
            case 'tijera':
                if ($jug2 == 'piedra') {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 2!';</script>";
                    $_SESSION['contador2']++;
                    break;
                } else if ($jug2 == 'papel') {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada ganada por Jugador 1!';</script>";
                    $_SESSION['contador1']++;
                    break;
                } else {
                    echo "<script>document.getElementById('mostrarResultado').textContent = 'Jugada empatada!';</script>";
                    break;
                }
        }
    } else {
        echo "<script>document.getElementById('mostrarResultado').textContent = 'No se ha jugado!';</script>";
    }

    //echo 'Contador 1: ' . $_SESSION['contador1'].'  -  '.'Contador 2: '.$_SESSION['contador2'];
    echo "<script>document.getElementById('cont1').textContent = '$_SESSION[contador1]';</script>";
    echo "<script>document.getElementById('cont2').textContent = '$_SESSION[contador2]';</script>";
    if($_SESSION['contador1'] ===3){
       echo "<script>document.getElementById('mostrarResultado').textContent = 'GANA JUGADOR 1!';</script>";
       session_unset();
       session_destroy();
    }
    if ($_SESSION['contador2'] === 3) {
        echo "<script>document.getElementById('mostrarResultado').textContent = 'GANA JUGADOR 2!';</script>";
        session_unset();
        session_destroy();
    }
}

?>

</html>