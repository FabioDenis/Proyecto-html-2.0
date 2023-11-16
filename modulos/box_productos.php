<div class="boton-ordenar-productos">
    <!-- Formulario para permitir al usuario seleccionar la orden -->
<form action="index.php?modulo=box_productos&accion=orden" method="post">
    <select name="orden" id="orden">
        <option value="mayor_menor"> Mayor a Menor Precio</option>
        <option value="menor_mayor">Menor a Mayor Precio</option>
        <!-- Otras opciones de orden -->
    </select>
    <button class="a-editar-eliminar " type="submit">Ordenar Productos</button>
</form>

</div>
<?php
// Verificar si se ha enviado el formulario de orden
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['orden'])) {
    // Obtener la orden seleccionada por el usuario
    $orden = $_POST['orden'];

    if ($orden === 'mayor_menor') {
        // Llamada al procedimiento almacenado para ordenar productos por precio de mayor a menor
        $sqlOrdenar = "CALL OrdenarProductosPorPrecio();";
        $resultadoOrdenar = mysqli_query($con, $sqlOrdenar);

        // Verificar el resultado de la ordenación
        if (!$resultadoOrdenar) {
            echo "Error al ordenar productos por precio: " . mysqli_error($con);
        } else {
            // Mostrar los productos después de la ordenación
            while ($r = mysqli_fetch_array($resultadoOrdenar)) {
                ?>
                <div class="contenedor-Imgenes-boxProductos">
                    <div class="div-primerImagen-boxProductos">
                        <p class="fs-1"><?php echo $r['nombre']; ?></p>
                        <a href="index.php?modulo=ficha_producto&accion=ver_ficha&id=<?php echo $r['id']; ?>">
                            <img src="Imagenes/<?php echo $r['foto']; ?>" class="img-fluid" alt="...">
                        </a>
                        <p class="fs-4">$ <?php echo $r['precio']; ?></p>
                    </div>
                </div>
                <?php
            }
        }
    } elseif ($orden === 'menor_mayor') {
        // Llamada al procedimiento almacenado para ordenar productos por precio de menor a mayor
        $sqlOrdenarAsc = "CALL OrdenarProductosAsc();";
        $resultadoOrdenarAsc = mysqli_query($con, $sqlOrdenarAsc);

        // Verificar el resultado de la ordenación
        if (!$resultadoOrdenarAsc) {
            echo "Error al ordenar productos por precio: " . mysqli_error($con);
        } else {
            // Mostrar los productos después de la ordenación
            while ($r = mysqli_fetch_array($resultadoOrdenarAsc)) {
                ?>
                <div class="contenedor-Imgenes-boxProductos">
                    <div class="div-primerImagen-boxProductos">
                        <p class="fs-1"><?php echo $r['nombre']; ?></p>
                        <a href="index.php?modulo=ficha_producto&accion=ver_ficha&id=<?php echo $r['id']; ?>">
                            <img src="Imagenes/<?php echo $r['foto']; ?>" class="img-fluid" alt="...">
                        </a>
                        <p class="fs-4">$ <?php echo $r['precio']; ?></p>
                    </div>
                </div>
                <?php
            }
        }
    }
} else {
    // Si no se ha enviado el formulario de orden, mostrar los productos sin ordenar
    $sql = "SELECT * FROM productos WHERE eliminado = 0";
    $resultado = mysqli_query($con, $sql);

    if ($resultado && mysqli_num_rows($resultado) != 0) {
        while ($r = mysqli_fetch_array($resultado)) {
            ?>
            <div class="contenedor-Imgenes-boxProductos">
                <div class="div-primerImagen-boxProductos">
                    <p class="fs-1"><?php echo $r['nombre']; ?></p>
                    <a href="index.php?modulo=ficha_producto&accion=ver_ficha&id=<?php echo $r['id']; ?>">
                        <img src="Imagenes/<?php echo $r['foto']; ?>" class="img-fluid" alt="...">
                    </a>
                    <p class="fs-4">$ <?php echo $r['precio']; ?></p>
                </div>
            </div>
            <?php
        }
    }
}
?>


