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

//Funcion Boton Comprar ficha del producto//

const botonComprar = document.getElementById("botonComprar");

// Agregar un evento de clic al botón
botonComprar.addEventListener("click", function () {
  // Cambiar la URL para redirigir al usuario a otra página
  window.location.href = "formulario_compra.html"; // Reemplaza con la URL deseada
});
