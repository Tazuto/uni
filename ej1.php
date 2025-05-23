<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Compra de Proveedores</title>
    </head>
    <body>
        <div>
        <form method="POST" action="vista.php">
            <label for="Proveedor">Proveedor: </label>
            <select name="proveedor">
                <option>Prov1</option>
                <option>Prov2</option>
            </select>
        </div>

        <br>
        <div>
            <label for="Producto">Producto: </label>
            <input type="text" name="producto" required>
        </div>

        <br>
        <div>
            <label for="Precio">Precio: </label>
            <input type="text" name="precio" pattern="[0-9.]*" required>
        </div>

        <br>
        <div>
            <label for="Cantidad">Cantidad: </label>
            <input type="number" name="cantidad" required>
        </div>
        <br><br>
            <input type="submit" name="Guardar" value="Guardar">
        </form>
    </div>
</html>