<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF">
        <title>Vista de Compra</title>
    </head>
    <body>
        <h2>Datos de la compra.</h2>
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $proveedor = $_POST["proveedor"];
                $producto = $_POST["producto"];
                $precio = $_POST["precio"];
                $cantidad = $_POST["cantidad"];
                $total = $precio * $cantidad;

                echo "<table border = '1'>";
                    echo "<tr>";
                        echo "<th>Proveedor</th>";
                        echo "<th>Producto</th>";
                        echo "<th>Precio</th>";
                        echo "<th>Cantidad</th>";
                        echo "<th>Total</th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<th>$proveedor</th>";
                        echo "<th>$producto</th>";
                        echo "<th>$precio</th>";
                        echo "<th>$cantidad</th>";
                        echo "<th>$total</th>";
                    echo "<tr>";
                echo "</table>";
            } else{
                echo "No se pudo enviar al archivo vista.php";
            }
        ?>
    </body>
</html>