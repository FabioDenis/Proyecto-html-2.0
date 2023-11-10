<?php
//capturo errores
if(!isset($_GET['accion']))
$_GET['accion'] = '';

if($_GET['accion'] == 'guardar_insertar'){
if(isset($_POST["nombre"]) && isset($_POST["descripcion"])&& isset($_POST["precio"]))
{
    //verifico que no exista el producto
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

        //inserto nuevo producto
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
}
//editar 
if($_GET['accion'] == 'guardar_editar')
{
    if(is_uploaded_file($_FILES['foto']['tmp_name']))
    {
        //copiar en un directorio
        $nombre = explode('.', $_FILES['foto']['name']);
        $foto = time().'.'.end($nombre);
        copy($_FILES['foto']['tmp_name'], 'imagenes/'.$foto);

        $mas_datos = ", foto='".$foto."'";
    }
    else{
        $mas_datos='';

    $sql = "UPDATE productos SET nombre='{$_POST['nombre']}', descripcion='{$_POST['descripcion']}',  precio='{$_POST['precio']}',{$mas_datos} WHERE id=".$_GET['id'];
    $sql = mysqli_query($con, $sql);
    if(!mysqli_error($con))
        echo "<script> alert('Poducto editado con exito');</script>";
    else
        echo "<script> alert('ERROR NO SE PUDO EDITAR EL PRODUCTO);</script>";
    }

}
//eliminar
if($_GET['accion'] == 'guardar_eliminar')
{
    $sql = "UPDATE productos SET eliminado = 1 WHERE id=".$_GET['id'];
    $sql = mysqli_query($con, $sql);
    if(!mysqli_error($con))
        echo "<script> alert('Producto eliminado con exito');</script>";
    else
        echo "<script> alert('ERROR NO SE PUDO ELIMINAR EL PRODUCTO);</script>";

}
?>



<section id="admin" class="contenedor-padre-insertar-producto">
    <div class="contenedor-insertar-producto">
    <h2>Insertar Producto</h2>
    <?php
    if($_GET['accion']== 'editar')
    {
        $url = 'index.php?modulo=insertar_producto&accion=guardar_editar&id='.$_GET['id'];
        $sql = "SELECT *FROM productos WHERE id = ".$_GET['id'];
        $sql = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql) != 0)
        {
            $r = mysqli_fetch_array($sql);
        }
    }
        else
            $url = 'index.php?modulo=insertar_producto&accion=guardar_insertar';
            $r['nombre'] = $r['descripcion'] = $r['precio'] = $r['foto'] = '' ;
    ?> 
            <form action="<?php echo $url;?>" method="POST" enctype="multipart/form-data">
                <label for="producto-nombre">Nombre del Producto:</label>
                
                <input type="text" id="nombre" name="nombre" value="<?php echo $r['nombre'];?>" required>

                <label for="producto-precio">Precio:</label>
                <input type="number" id="precio" name="precio" value="<?php echo $r['precio'];?>" required>

                <label for="producto-descripcion">Descripción :</label>
                
                <textarea id="descripcion" name="descripcion" required><?php echo $r['descripcion'];?></textarea>
                <br>
                <label for="producto-foto">Foto:</label> <input type="file" id="foto" name="foto" >
                
                <br>
                <br>
                <?php
                 if(!empty($r['foto']))
                    {
                ?>
                    <img src="imagenes/<?php echo $r['foto'];?>" width="10%">
                 <?php
                }
                    ?>
                <button  type="submit">Agregar Producto</button>
            </form>

    </div>
            
</section>