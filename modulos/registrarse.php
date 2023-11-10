<?php
if (isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST['correo'])) {
    // Verifica si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE nombre = '" . $_POST['nombre'] . "'";
    $sql = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql) != 0) {
        echo "<script> alert('Error: El usuario ya existe en la base de datos');</script>";
    } else {
        // Inserta el nuevo usuario con id_rol predeterminado en 2
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $correo = $_POST['correo'];
        $id_rol = 2; 

        $sql = "INSERT INTO usuarios (nombre, clave, correo, id_rol) VALUES ('$nombre', '$clave', '$correo', $id_rol)";
        $sql = mysqli_query($con, $sql);

        if (mysqli_error($con)) {
            echo "<script> alert('ERROR: No se pudo insertar el registro');</script>";
        } else {
            echo "<script> alert('Registro insertado con éxito');</script>";
        }
    }
    echo "<script>window.location='index.php?modulo=registrarse';</script>";
}
?>





<div class="contenedor-login">
    <div class ="contenedor-formulario-login">
<h2>Registrarse</h2>
        <form action="index.php?modulo=registrarse" method="POST">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" required>
            <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
            <input type="password" id="clave" name="clave" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>

</div>
</div>
