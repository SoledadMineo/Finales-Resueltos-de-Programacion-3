<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte D</title>
    <script src="javascript">
        function validar(){
            var valor = document.getElementById('valor');
            if (valor%2==0){
                alert ("Debe ingresar un valor impar");
                return false;
            }else{
                return true;
            }
        }
    </script>
</head>
<body>
    <form action="genera_matriz.php" method="post" onsubmit="validar()">
        Ingrese un valor: <input type="number" id="valor" name="valor" placeholder="Ingrese valor impar"><br>
        <input type="submit" value="Cargar">
    </form>
    
</body>
</html>