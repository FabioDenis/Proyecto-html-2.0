<div class="contenedor-imagenes-ficha_producto">
    <?php
    // Asegurarse de que $_GET['accion'] está definido antes de usarlo
    if (isset($_GET['accion']) && $_GET['accion'] == 'ver_ficha' && isset($_GET['id'])) {
        $url = 'index.php?modulo=producto&accion=ver_fichar&id=' . $_GET['id'];
        $id_producto = $_GET['id'];
        $sql = "SELECT * FROM productos WHERE id = $id_producto";
        $result = mysqli_query($con, $sql);

        // Asegurarse de que $result sea una consulta exitosa
        if ($result && mysqli_num_rows($result) > 0) {
            $r = mysqli_fetch_array($result);
            ?>
        <div class="container-carrusel-ficha_producto">

          <div class="ImagenesC" id="sliderImagenes">
            <div class="imagen-item">
              <img
                class="imagen_grande1"
                src="imagenes/<?php echo $r['foto']; ?>"
                alt=""
              />
            </div>
          </div>
         
        </div>

    


        
        <!-- Contenido existente ... -->
        <div class="contenedor-Texto-ficha_producto">
       
            <div class="div-texto-ficha_producto">
                <p class="h2"><?php echo $r['nombre']; ?></p>
                <br />
               
                <p class="fw-semibold"><?php echo $r['precio']; ?>$</p>
                <hr />
                <br />
                <p class="h6"><?php echo $r['descripcion']; ?></p>
                <br>
                <?php
        }
    }
    ?>
               
                    
                <form id="formularioAgregarCarrito" method="POST" action="index.php?modulo=ficha_producto&accion=agregar_carrito&id=<?php echo $r['id']; ?>"  > 
                <label for="cantidad">Cantidad:</label>
               
                <input type="number" id="cantidad" name="cantidad" min="1" value="1" required>
                <br>
                <?php
                if (!empty($_SESSION['nombre-usuario'])) {
                ?>
                <!-- Cambios aquí: Agregar el botón de tipo "submit" dentro del formulario -->
                <button type="submit">Agregar al Carrito</button>
                <br />
                <br />
                <br />
                <br />
                <img src="Imagenes/mercado-pago-.png" class="img-fluid" alt="..." />
                <script src="JavaScript/script.js"></script>
                </div>
            
          </div>
                </form>
                <?php
                }
                ?>
 
 <?php
if ($_GET['accion'] == 'agregar_carrito') {
  // Obtén el id del usuario y del producto
  $id_usuario = $_SESSION['id'];
  $id_producto = $_GET['id'];
  $cantidad = $_POST['cantidad'];

  // Verifica si el producto ya existe en el carrito para el usuario actual
  $sql_verificar = "SELECT id FROM carrito WHERE id_usuario = $id_usuario AND id_producto = $id_producto";
  $resultado_verificar = mysqli_query($con, $sql_verificar);

  if ($resultado_verificar && mysqli_num_rows($resultado_verificar) > 0) {
      // El producto ya existe en el carrito, muestra un mensaje de error
      echo "<script> alert('Este producto ya está en el carrito'); window.location.href='index.php?modulo=box_productos';</script>";
  } else {
      // El producto no existe en el carrito, realiza la inserción
      $sql_insertar = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES ($id_usuario, $id_producto, $cantidad)";
      $resultado_insertar = mysqli_query($con, $sql_insertar);

      if ($resultado_insertar) {
        echo "<script> alert('Producto agregado al carrito'); window.location.href='index.php?modulo=box_productos';</script>";
      } else {
          echo "<script> alert('Error al agregar el producto al carrito'); window.location.href='index.php?modulo=ficha_producto';</script>";
      }
  }
}
?>     
    
</div>


      






 
   
