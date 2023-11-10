<?php
if(isset($_POST["nombre"]) && isset($_POST["descripcion"])&& isset($_POST["precio"]))
{
    //verifico que no exista el disfraz
    $sql = "SELECT * FROM productos where nombre = '".$_POST['nombre']."'";
    $sql = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql)!= 0)
    {
        echo "<script> alert(' Error: El Producto ya existe en la base de datos');</script>";
    }
    else
    {
        //procesar foto
        if(is_uploaded_file($_FILES['foto']['tmp_name']))
        {
            $nombre = explode('.', $_FILES['foto']['name']);
            $foto = time() .'.'.end($nombre);
            copy($_FILES['foto']['tmp_name'],'imagenes/'.$foto);
        }
        
        //fin de procesar la foto

        //inserto nuevo disfraz
        $sql = "INSERT INTO productos (nombre,descripcion,precio,foto) values('".$_POST['nombre']."','".$_POST['descripcion']."','".$_POST['precio']."','".$foto."')";
        $sql = mysqli_query($con, $sql);
        if(mysqli_error($con))
        {
            echo "<script> alert('ERROR NO SE PUDO INSERTAR EL REGISTRO');</script>";
        }
            else
            {
                echo "<script> alert('Registro insertado con exito');</script>";
            }
    }  

}
?>


<section id="admin" class="contenedor-padre-insertar-producto">
    <div class="contenedor-insertar-producto">
    <h2>Insertar Producto</h2>
            <form action="index.php?modulo=insertar_producto" method="POST" enctype="multipart/form-data">
                <label for="producto-nombre">Nombre del Producto:</label>
                
                <input type="text" id="nombre" name="nombre" required>

                <label for="producto-precio">Precio:</label>
                <input type="number" id="precio" name="precio" required>


                
                <label for="producto-descripcion">Descripción :</label>
                
                <textarea id="descripcion" name="descripcion" required></textarea>
                <br>
                <label for="producto-foto">Foto:</label> <input type="file" id="foto" name="foto" >
                <br>
                <br>
                
                
                
                <button  type="submit">Agregar Producto</button>
            </form>

    </div>
            
</section>