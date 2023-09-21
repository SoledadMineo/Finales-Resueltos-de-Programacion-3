<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto C</title>
    <script>
        function ValidarFormulario() {
            var usuario = document.getElementById('usuario').value;
            var clave = document.getElementById('clave').value;

            // Hacer obligatorios los campos
            if (usuario.trim() === "" || clave.trim() === "") {
                alert("El campo es obligatorio");
                return false;
            }

             // Verificar si la longitud del valor del campo es menor que el mínimo
            var minLength = 6;
            if (clave.length < minLength) {
                alert("La clave debe tener al menos " + minLength + " caracteres.");
                return false;
            }
            
            // Verificar si el campo contiene al menos un número
            var patron=new RegExp('[0-9]');
            if (!(patron.test(clave))) {
                alert("El campo clave debe contener al menos un número.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <form action="login.php" method="post" onsubmit="return ValidarFormulario();">
        Usuario: <input type="text" name="usuario" id="usuario"><br>
        Contraseña: <input type="text" name="clave" id="clave"><br>
        <input type="submit" value="Ingresar">
    </form>
</body>

</html>