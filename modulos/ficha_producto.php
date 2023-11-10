<div class="contenedor-imagenes-ficha_producto">
      <?php
      if ($_GET['accion'] == 'ver_ficha') {
        $url = 'index.php?modulo=producto&accion=ver_fichar&id=' . $_GET['id'];
        $sql = "SELECT *FROM productos WHERE id = " . $_GET['id'];
        $sql = mysqli_query($con, $sql);
        if (mysqli_num_rows($sql) != 0) {
            $r = mysqli_fetch_array($sql);
        }
      }
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

        <div class="contenedor-Texto-ficha_producto">
          <div class="div-texto-ficha_producto">
            <p class="h2"><?php echo $r['nombre']; ?></p>
            <br />
            <p class="fw-semibold"><?php echo $r['precio']; ?>$</p>
            <hr />
            <br />
            <p class="h6"><?php echo $r['descripcion']; ?></p>
            <button type="button" 
            class="btn btn-primary btn-lg" id="botondecompra">COMPRAR</button>
            <br />
            <br />
            <br />
            <br />
            <img src="Imagenes/mercado-pago-.png" class="img-fluid" alt="..." />
            <script src = "JavaScript/script.js"></script>
          </div>
        </div>
      </div>
      
      

