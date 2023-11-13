<?php
$id_usuario = $_SESSION['id'];

// Consulta para obtener las compras realizadas por el usuario
$sql_compras = "SELECT * FROM compras WHERE id_usuario = '$id_usuario'";
$resultado_compras = mysqli_query($con, $sql_compras);

if ($resultado_compras) {
    // Mostrar la información de cada compra
    while ($fila_compra = mysqli_fetch_assoc($resultado_compras)) {
        $id_compra = $fila_compra['id'];
        $total_compra = $fila_compra['total'];
?>

        <!-- Consulta para obtener los detalles de la compra -->
        <?php
        $sql_detalles = "SELECT * FROM detalle_compras WHERE id_compra = '$id_compra'";
        $resultado_detalles = mysqli_query($con, $sql_detalles);
        ?>

        <!-- Mostrar los detalles de la compra -->
        <?php
        while ($fila_detalle = mysqli_fetch_assoc($resultado_detalles)) {
            $id_producto = $fila_detalle['id_producto'];
            $cantidad = $fila_detalle['cantidad_producto'];
            $precio_u = $fila_detalle['precio_u'];

            // Consulta para obtener nombre del producto desde la tabla 'productos'
            $sql_producto = "SELECT nombre FROM productos WHERE id = '$id_producto'";
            $resultado_producto = mysqli_query($con, $sql_producto);

            if ($resultado_producto && $fila_producto = mysqli_fetch_assoc($resultado_producto)) {
                $nombre_producto = $fila_producto['nombre'];
        ?>

                <!-- Estructura de la tabla de mis compras -->
                <div class="tabla-mis-compras-container">
                    <table class="tabla-mis-compras">
                        <thead>
                            <tr>
                                <h5 class="texto-miscompras">Compra Realizada Con Exito!!</h5>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Precio U</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $id_producto ?></td>
                                <td><?php echo $nombre_producto ?></td>
                                <td><?php echo $precio_u ?></td>
                                <td><?php echo $cantidad ?></td>
                                <td>$<?php echo $total_compra ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>

<?php
            }
        }
        ?>

<?php
    }
}
?>




    
  
  