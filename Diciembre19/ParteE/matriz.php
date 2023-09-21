<?php
    if (isset($_POST['tam']) && isset($_POST['fila']) && isset($_POST['col'])) {
        $tam = $_POST['tam'];
        $fila = $_POST['fila'];
        $col = $_POST['col'];

        if($fila >= $tam || $col >= $tam){
            echo "La fila o columna seleccionada no es un valor válido";
        }else{
            echo "<table border=1>";
           
            for($i=0; $i<$tam; $i++){
                echo "<tr>";
                for($j=0; $j<$tam; $j++){
                    echo "<td>";    
                    if($i == $fila && $j == $col){
                        echo "<b>X</b>";
                    }else if(($fila==$i) && ($j==$col-1 || $j==$col+1)){
                        echo "<b>1</b>";
                    }else if(($col==$j) && ($i==$fila-1 || $i==$fila+1)){
                        echo "<b>1</b>";
                    }else if($fila==0 && ($i==$tam-1 && $j==$col)){
                        echo "<b>1</b>";
                    }else if($fila==$tam-1 && ($i==0 && $j==$col)){
                        echo "<b>1</b>";
                    }else if($col==0 && ($i==$fila && $j==$tam-1)){
                        echo "<b>1</b>";
                    }else if($col==$tam-1 && ($i==$fila && $j==0)){
                        echo "<b>1</b>";
                    }else{
                        echo "0"; 
                    }
                }
                echo "</td>";
            }
            
            echo "</tr>";
            
        }
        echo "</table>";
    }
?>