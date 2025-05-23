<?php
session_start(); // 1. Iniciar sesión

// 2. Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $compra = [
        'proveedor' => $_POST['proveedor'],
        'producto' => $_POST['producto'],
        'precio' => floatval($_POST['precio']),
        'cantidad' => intval($_POST['cantidad']),
        'total' => floatval($_POST['precio']) * intval($_POST['cantidad'])
    ];

    // 3. Guardar en la sesión
    if (!isset($_SESSION['compras'])) {
        $_SESSION['compras'] = [];
    }
    $_SESSION['compras'][] = $compra;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vista de Compras</title>
</head>
<body>
    <h2>Listado de Compras</h2>

    <?php if (!empty($_SESSION['compras'])): ?>
        <table border="1">
            <tr>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            <?php
            $totalGeneral = 0;
            foreach ($_SESSION['compras'] as $compra) {
                echo "<tr>";
                echo "<td>{$compra['proveedor']}</td>";
                echo "<td>{$compra['producto']}</td>";
                echo "<td>{$compra['precio']}</td>";
                echo "<td>{$compra['cantidad']}</td>";
                echo "<td>{$compra['total']}</td>";
                echo "</tr>";
                $totalGeneral += $compra['total'];
            }
            ?>
            <tr>
                <td colspan="4"><strong>Total General</strong></td>
                <td><strong><?= $totalGeneral ?></strong></td>
            </tr>
        </table>
        <form method="post">
            <input type="submit" name="limpiar" value="Limpiar datos">
        </form>
    <?php else: ?>
        <p>No hay compras registradas.</p>
    <?php endif; ?>

    <?php
    // 4. Botón para limpiar sesión
    if (isset($_POST['limpiar'])) {
        $_SESSION['compras'] = [];
        header("Location: " . $_SERVER['PHP_SELF']); // Recargar la página
        exit();
    }
    ?>
</body>
</html>
