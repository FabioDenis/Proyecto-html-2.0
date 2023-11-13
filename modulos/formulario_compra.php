<?php
if (!isset($_GET['accion'])) {
    $_GET['accion'] = '';
}

if ($_GET['accion'] == 'form_compra') {
    ?>
    <div class="contenedor-central">
        <div class="contenedor-formulario">
            <h2>Formulario de Compra</h2>
            <form id="formularioCompra" action="index.php?modulo=formulario_compra&accion=cargar_direccion&&accion=confirmar_compra" method="post">
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                    <div style="width: 100%;">
                        <label for="nombre" class="etiqueta-formulario">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="entrada-formulario" required>
                    </div>
                    <div style="width: 100%;">
                        <label for="apellido" class="etiqueta-formulario">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="entrada-formulario" required>
                    </div>
                    <div style="width:100%;">
                        <label for="direccion" class="etiqueta-formulario">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="entrada-formulario" required>
                    </div>
                    <div style="width: calc(50% - 10px);">
                        <label for="ciudad" class="etiqueta-formulario">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" class="entrada-formulario" required>
                    </div>
                    <div style="width: calc(50% - 10px);">
                        <label for="codigoPostal" class="etiqueta-formulario">Código Postal:</label>
                        <input type="text" id="codigoPostal" name="codigoPostal" class="entrada-formulario" required>
                    </div>
                    <div style="width: 100%;">
                        <label for="medioPago" class="etiqueta-formulario">Medio de Pago:</label>
                        <select id="medioPago" name="medioPago" class="select-formulario" required>
                            <option value="credito">Tarjeta de Crédito</option>
                            <option value="debito">Debito</option>
                            <option value="mercadopago">Mercado Pago</option>
                        </select>
                    </div>
                </div>
  
                <button type="submit" class="boton-formulario">Cargar info</button>
            </form>

            <!-- Botón "Realizar Compra" inicialmente oculto -->
            <button id="botonConfirmarCompra" style="display: none;" type="submit" class="boton-formulario">Realizar Compra</button>
        </div>
    </div>
    <?php
}

if ($_GET['accion'] == 'cargar_direccion') {
    // CARGAR DIRECCION
    $id_usuario = $_SESSION['id'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $codigo_postal = $_POST['codigoPostal'];
    $sql = "INSERT INTO direccion (id_usuario, direccion, ciudad, codigo_postal) VALUES ('$id_usuario', '$direccion', '$ciudad', '$codigo_postal')";
    $sql = mysqli_query($con, $sql);
    if (mysqli_error($con)) {
        echo "<script> alert('ERROR NO SE PUDO GUARDAR LA DIRECCION');</script>";
    } else {
        echo "<script> alert('Direccion guardada con éxito');</script>";
    }
}

if ($_GET['accion'] == 'confirmar_compra') {
    $id_usuario = $_SESSION['id'];
    $metodo_pago = $_POST['medioPago'];  // Añadí el punto y coma aquí
    $sql = "INSERT INTO compras (id_usuario, metodo_pago, total) VALUES ('$id_usuario', '$metodo_pago', 0)";
    $sql = mysqli_query($con, $sql);
    $id_compra = mysqli_insert_id($con);

    // Calcular el total del carrito directamente en la base de datos
    $total_compra = 0;

    // Obtener los productos del carrito para el usuario actual
    $sql_carrito = "SELECT id_producto, cantidad FROM carrito WHERE id_usuario = '$id_usuario'";
    $resultado_carrito = mysqli_query($con, $sql_carrito);
    
    if ($resultado_carrito) {
        while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) { 
            $id_producto = $fila_carrito['id_producto'];
            $cantidad = $fila_carrito['cantidad'];

            // Obtener el precio del producto desde la tabla 'productos' (corregí 'ropas' por 'productos')
            $sql_precio = "SELECT precio FROM productos WHERE id = '$id_producto'";
            $resultado_precio = mysqli_query($con, $sql_precio);

            if ($resultado_precio && $fila_precio = mysqli_fetch_assoc($resultado_precio)) {
                // Calcular el subtotal y agregar al total de la compra
                $precio_u = $fila_precio['precio'];
                $subtotal = $precio_u * $cantidad;
                $total_compra += $subtotal;

                // Crear un registro en la tabla 'detalle_compra' para cada producto con todos los datos reunidos
                $sql_detalle = "INSERT INTO detalle_compras (id_compra, id_producto, cantidad_producto, precio_u) VALUES ('$id_compra', '$id_producto', '$cantidad', '$precio_u')";
                $resultado_detalle = mysqli_query($con, $sql_detalle);
            }
        }

        // Actualizar el total de la compra en la tabla 'compras'
        $sql_actualizar_total = "UPDATE compras SET total = '$total_compra' WHERE id = '$id_compra'";
        $resultado_actualizar_total = mysqli_query($con, $sql_actualizar_total);

        if ($resultado_actualizar_total) { 
            $sql_limpiar_carrito = "DELETE FROM carrito WHERE id_usuario = '$id_usuario'";
            mysqli_query($con, $sql_limpiar_carrito);
            echo "<script> alert('COMPRA REALIZADA CON EXITO!! ');</script>";
            echo "<script>window.location='index.php';</script>";
        }
    }
}
?>