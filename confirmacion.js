function Del() {
  var r = confirm("Are you sure?")
  if (r == true) {
    return href;
  } else {
    return false;
  }
}

function validar() {
  var Validacion = document.getElementById('carrera');
  if (Validacion.value == "") {
      alert("Selecciona una opcion para continuar");
      Validacion.focus();
  } else {}
}
