function Modalidad() {
  var modalidad = document.getElementById("ModalidadIngresoLaboral").value;

  var selctSede = document.getElementById("selctSede");

  if (modalidad == "presencial") {
    selctSede.style.display = "block";
  } else {
    selctSede.style.display = "none";
  }
}
