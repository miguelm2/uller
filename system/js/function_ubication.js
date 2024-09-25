
function habilitarOtraUbicacion() {
   var ubicacion = document.getElementById("ubicacion").value;
   var otra_ubicacion = document.getElementById("otra_ubicacion");

   if (ubicacion === "9") {
      //hablita los campos
      otra_ubicacion.removeAttribute("disabled");

   } else {
      //Deshabilita los campos
      otra_ubicacion.setAttribute("disabled", "disabled");

      // Quita la obligatoriedad del campo
      otra_ubicacion.removeAttribute("required");
   }
}

document.addEventListener("DOMContentLoaded", function() {
   habilitarOtraUbicacion();
});

document.getElementById("ubicacion").addEventListener("change", habilitarOtraUbicacion);