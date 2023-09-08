<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Octubre 2019</title>
</head>
<body>
    <form action="genera_matriz.php" method="post">
        <label for="numero">Ingrese un número impar mayor o igual a 3:</label>
        <input type="number" id="numero" name="numero" required min="3" step="2">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>