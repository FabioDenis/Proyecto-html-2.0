<?php
$sql = "SELECT * FROM productos";
$sql = mysqli_query($con, $sql);
?>

<div class="contenedor-tabla_productos">
  <table class="table">
    <thead>
      <tr>
        <th scope="Col">Producto</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Foto</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

      <?php
      if (mysqli_num_rows($sql) != 0) {
        while ($r = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <th scope="row">Remera</th>
            <td><?php echo $r['nombre'];?></td>
            <td><?php echo $r['precio'];?></td>
            <td><?php echo $r['descripcion'];?></td>
            <td>#</td>
            <td><button><a href="#">Editar</a></button></td>
          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<div class="contenedor-boton-nuevoArticulo">
  <button type="button" id="boton-agregar-producto">
    <a class="boton-agregar-producto" href="index.php?modulo=insertar_producto">Insertar Nuevo Articulo</a>
  </button>
</div>
<script src="JavaScript/script.js"></script>

