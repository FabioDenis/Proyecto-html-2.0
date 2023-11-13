const noticias = document.querySelectorAll(".imagen-item");
let noticiaActual = 0;

const btnAnterior = document.getElementById("btnAnterior");
const btnSiguiente = document.getElementById("btnSiguiente");

btnAnterior.addEventListener("click", () => {
  //ocultamos la noticia actual
  noticias[noticiaActual].style.display = "none";
  //calculamos la nueva posicion
  noticiaActual = (noticiaActual - 1 + noticias.length) % noticias.length;
  //mostramos la nueva imagen
  noticias[noticiaActual].style.display = "block";
});

btnSiguiente.addEventListener("click", () => {
  noticias[noticiaActual].style.display = "none";
  noticiaActual = (noticiaActual + 1) % noticias.length;
  noticias[noticiaActual].style.display = "block";
});

// Selecciona el botón por su id
var boton = document.getElementById("botondecompra");

// Añade un evento de clic al botón
boton.addEventListener("click", function() {
  // Obtiene la url de la sección a la que quieres redireccionar
  var url = "index.php?modulo=carrito";

  // Redirecciona la ventana actual a la url
  window.location.href = url;
});





