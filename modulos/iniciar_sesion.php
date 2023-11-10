<?php

//cerrar sesion
if(isset($_GET['salir']))
{
    session_destroy();
    echo "<script>window.location='index.php';</script>";
}


if (isset($_POST['nombre']) && isset($_POST['clave'])) {
    $sql = "SELECT * FROM usuarios WHERE nombre = '" . $_POST['nombre'] . "' AND clave = '" . $_POST['clave'] . "'";
    $sql = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql) != 0) {
        // Obtener los datos del usuario
        $r = mysqli_fetch_array($sql);

        // Crear las variables de sesión
        $_SESSION['id'] = $r['id'];
        $_SESSION['nombre-usuario'] = $r['nombre'];
        $_SESSION['rol'] = $r ['id_rol'];
        // Verificar el id_rol del usuario
        if ($r['id_rol'] == 1) {
            // Si el usuario tiene id_rol igual a 1 (por ejemplo, un administrador), redirigir a insertar_producto.php
            header("Location: index.php?modulo=tabla_productos");
        } else {
            // Redirigir a otra página según el rol
            // Puedes agregar más casos aquí si tienes varios roles diferentes
            header("Location:index.php");
        }
    } else {
        echo "<script>alert('Verifique los datos.');</script>";
    }
    echo "<script>window.location='index.php?modulo=iniciar_sesion';</script>";
}
?>


<div class="contenedor-login">
    <div class="contenedor-formulario-login">
        <h2>Iniciar sesión</h2>
        <form action="index.php?modulo=iniciar_sesion" method="POST">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre de usuario" required>
            <input type="password" id="clave" name ="clave" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>

    
</div> 