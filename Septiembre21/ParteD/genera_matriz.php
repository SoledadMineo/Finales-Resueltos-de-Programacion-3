<?php
    $valor = $_POST['valor'];
    $suma[] = 0;
    echo ('<table border=1>');
    for($col=0; $col<$valor; $col++){
        echo ('<td>');
        for($fila=0; $fila<$valor; $fila++){
            echo ('<tr>');
            $celda = ($fila+1)*($col+1); 
            echo ($celda);
            if($fila == $valor-1){
                echo ($suma[$fila]);
            }else{
                $suma[$col]+= $celda;
            }
        }
        echo ('</tr>');
    }
    echo ('</td>');
    echo ('</table>');

?>