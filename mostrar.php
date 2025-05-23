<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ingresar tabla</title>
    </head>
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $num = $_POST['numero'];
                $lim = $_POST['limite'];
                
                echo "<table border='1'>";
                echo "<tr>";
                    echo "<th>MULTIPLICACION</th>";
                    echo "<th>RESULTADO</th>";
                echo "</tr>";

                for($i=1;$i<$lim+1;$i++){
                    $valor = $num * $i;
                    echo "<tr>";
                        echo "<td> $num x $i </td>";
                        echo "<td> $valor </td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>