<?php
// Verificar si se debe eliminar un producto del carrito
if (!isset($_GET['accion'])) {
    $_GET['accion'] = '';
}

if ($_GET['accion'] == 'eliminar_carrito') {
    // Eliminar producto del carrito
    if (isset($_GET['id'])) {
        $id_usuario = $_SESSION['id'];
        $id_producto = $_GET['id'];
        $sql = "DELETE FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        $sql = mysqli_query($con, $sql);

        if (mysqli_error($con)) {
            echo "<script> alert('ERROR NO SE PUDO ELIMINAR PRODUCTO DEL CARRITO);</script>";
        } else {
            echo "<script> alert('Producto eliminado del carrito con éxito');</script>";
        }
    }
}
?>

<div class="div-titulo-carrito">
    <h1 class="texto-titulo-carrito">Su Carrito de Compras</h1>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>Precio U</th>
            <th>Cantidad</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_usuario = $_SESSION['id'];
        $sql = "SELECT c.id_producto, p.nombre, p.precio, c.cantidad FROM carrito c JOIN productos p ON c.id_producto = p.id WHERE c.id_usuario = '$id_usuario' AND eliminado = 0";
        $sql = mysqli_query($con, $sql);

        if (mysqli_num_rows($sql) != 0) {
            while ($r = mysqli_fetch_array($sql)) {
        ?>
                <tr>
                    <th scope="row"><?php echo $r['id_producto']; ?></th>
                    <td class="table-active"><?php echo $r['nombre']; ?></td>
                    <td><?php echo $r['precio']; ?>$</td>
                    <td class="table-active"><?php echo $r['cantidad']; ?></td>
                    <td>
                        <a class="a-eliminar-continuar" href="javascript:if(confirm('Desea eliminar el producto del carrito?')) window.location='index.php?modulo=carrito&accion=eliminar_carrito&id=<?php echo $r['id_producto']; ?>'">Eliminar</a>
                        <a class="a-eliminar-continuar" href="index.php?modulo=formulario_compra">Continuar</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
