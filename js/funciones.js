function validarFormVacio(formulario) {
  datos = $("#" + formulario).serialize();
  d = datos.split("&");
  vacios = 0;
  for (i = 0; i < d.length; i++) {
    controles = d[i].split("=");
    if (controles[1] == "A" || controles[1] == "") {
      vacios++;
    }
  }
  return vacios;
}

class Ajax {
  constructor(objeto) {
    this.tipo = objeto.metodo.toLowerCase();
    this.url = objeto.url;
    this.async = objeto.async;
    this.respuesta = function () {
      const data = "";
      const peticion = new XMLHttpRequest();

      peticion.open(this.tipo, this.url, this.async);
      const valor = peticion.addEventListener("load", (e) => {
    return e.target.response;
        // console.log()
      });

      peticion.send();

      return valor;
   }
  }
}
