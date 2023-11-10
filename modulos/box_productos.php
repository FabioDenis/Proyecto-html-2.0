<?php
$sql = "SELECT * FROM productos WHERE eliminado=0 ";
$sql = mysqli_query($con, $sql);
if (mysqli_num_rows($sql) != 0) {
    while ($r = mysqli_fetch_array($sql)) {
        ?>
      <div class="contenedor-Imgenes-boxProductos">
        <div class="div-primerImagen-boxProductos">
          <p class="fs-1"><?php echo $r ['nombre'];?></p>
          <a  href="index.php?modulo=ficha_producto&accion=ver_ficha&id=<?php echo $r['id']; ?>"
            ><img
              src="Imagenes/<?php echo $r ['foto'];?>"
              class="img-fluid"
              alt="..."
          /></a>
          <p class="fs-4">$ <?php echo $r ['precio'];?></p>
        </div>
        <?php
    }
  }
    
         
