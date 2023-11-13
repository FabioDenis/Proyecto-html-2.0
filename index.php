<?php
session_start();
include('includes/conexion.php');
conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Fuente-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Poppins:wght@200;300;700&display=swap" rel="stylesheet">
    <!---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="Estilos/estilo.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ficha_Producto</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Hala.Ind</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?modulo=box_productos">Box Productos</a>
                        </li>
                        <?php
                        if (isset($_SESSION['nombre-usuario'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?modulo=mis_compras">Mis Compras</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['nombre-usuario'])) {
                            ?>
                            <?php
                            if ($_SESSION['rol'] == 1) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?modulo=tabla_productos">Tabla Productos</a>
                                </li>
                                <?php
                            }
                            ?>
                            </div>
                            <div class="div-nombreUsuario-salir">
                                <p>
                                    <?php echo $_SESSION['nombre-usuario'] ?>
                                    <a class="a-div-nombreUsuario-salir" class="div-Usuario-salir" href="index.php?modulo=iniciar_sesion&salir=ok">Salir </a> 
                                </p>
                                <p class="p-carrito">
                                    <a href="index.php?modulo=carrito"><img src="Imagenes/carrito2.png"  width ="30px" alt=""></a>
                                </p>
                            </div>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?modulo=iniciar_sesion">Iniciar Sesion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?modulo=registrarse">Registrarse</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Widget chat de wpp-->
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-dae422f1-2f6b-4de2-910f-79afe21f2183"></div>
    <!-------------------------------------------------------------------------------------------------------->

    <main>
        <?php
        if (!empty($_GET['modulo'])) {
            include('modulos/' . $_GET['modulo'] . '.php');
        } else {
            ?>
            <div class="index-contenedor-h1-eslogan">
                <h1 class="display-4"> Hala.Indumentaria: <br>
                    <p class="p-texto-eslogan">Donde la moda se encuentra con la comodidad.</p></h1>
            </div>
            <div class="contenedor-carrusel-index">
                <div class="carrusel-index">
                    <div class="cuadros">
                        <div class="slide"><img src="Imagenes/REMERA-Monkey talks 3.jpg" alt="Foto 1"></div>
                        <div class="slide"><img src="Imagenes/REMERA-The cock-4.jpg" alt="Foto 2"></div>
                        <div class="slide"><img src="Imagenes/REMERA-Work 2.jpg" alt="Foto 3"></div>
                        <div class="slide"><img src="Imagenes/REMERA-Fruit.jpg" alt="Foto 4"></div>
                    </div>
                </div>

                <!--PLUGIN POP UP CON JQUERY-->
                <div id="boxes">
                    <div id="dialog" class="window">
                        <h2>En esta página, se encontrará con ropa de la mejor calidad y estilo posible. Si no está preparado para deslumbrarse con tanta sofisticación, ¡Entonces tal vez este no sea el lugar para usted! </h2> 
                        <div id="popupfoot"> <a href="#" class="close agree">Estoy listo</a> | <a class="agree"style="color:red;" href="#">No estoy listo</a> </div>
                    </div>
                    <div id="mask"></div>
                </div>

                <script>
                    $(document).ready(function() {	
                        var id = '#dialog';

                        //Obtener el alto y ancho de la pantalla
                        var maskHeight = $(document).height();
                        var maskWidth = $(window).width();

                        //Establece el alto y el ancho de la máscara para llenar toda la pantalla
                        $('#mask').css({'width':maskWidth,'height':maskHeight});

                        //efecto de transición
                        $('#mask').fadeIn(500);	
                        $('#mask').fadeTo("slow",0.9);	

                        //Obtener el alto y ancho de la ventana
                        var winH = $(window).height();
                        var winW = $(window).width();

                        <!--Establece el alto y el ancho de la máscara para llenar toda la pantalla-->
                        $('#mask').css({'width':maskWidth,'height':maskHeight});

                        //efecto de transición
                        $('#mask').fadeIn(500);	
                        $('#mask').fadeTo("slow",0.9);	

                        //Obtener el alto y ancho de la ventana
                        var winH = $(window).height();
                        var winW = $(window).width();
        
                        //Establece la ventana emergente en el centro
                        $(id).css('top',  winH/2-$(id).height()/2);
                        $(id).css('left', winW/2-$(id).width()/2);

                        //efecto de transición
                        $(id).fadeIn(2000); 	

                        //si se hace clic en el botón cerrar
                        $('.window .close').click(function (e) {
                        //Cancelar el comportamiento del enlace
                        e.preventDefault();

                        $('#mask').hide();
                        $('.window').hide();
                        });
                        });
                  </script>
                <!------------------------------------------------------------------------> 
      </main>
      <footer>

      </footer>
      <?php
      }
      ?>
<script src="js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
</body>
</html>