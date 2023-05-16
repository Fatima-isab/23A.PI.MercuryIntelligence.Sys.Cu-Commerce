function abrirModal() {
    const modal = document.getElementById("modal");
    modal.style.display = "block";
  }
  
  const cerrar = document.getElementsByClassName("cerrar")[0];
  cerrar.onclick = function() {
    const modal = document.getElementById("modal");
    modal.style.display = "none";
  }
  
  const publicar = document.getElementById("publicar");
  publicar.onclick = function() {
    // Aquí iría el código para agregar una respuesta al cuestionario
  }
  