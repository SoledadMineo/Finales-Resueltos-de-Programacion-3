<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML - Javascript * Final Octubre 2.019</title>
    <script>
        function ValidarFormulario(){
            var texto = document.getElementById('cajaTexto');
            if(texto == '' || texto == null){
                alert ('Debe ingresar un texto');
                return false;
            }
            return true;
        }

        function cargarCombo(){
            
                var texto = document.getElementById('cajaTexto').value;
                var select = document.getElementById('combo');

                var option = document.createElement('option');
                option.text = texto;
                option.value = texto;
                select.appendChild(option);
            
        }
    </script>
</head>
<body>
    <form action="" onsubmit="return ValidarFormulario()">
        Ingrese texto: <input type="text" name="cajaTexto" id="cajaTexto"><br>
        <select name="combo" id="combo"></select>
        <input type="submit" value="Ingresar" onclick="cargarCombo()">
    </form>
    
</body>
</html>