const getData = (id) => {
  return new Promise((resolve, reject) => {
    const inputValor = document.getElementById(id).value;

    if (
      inputValor == null ||
      inputValor.length == 0 ||
      /^\s+$/.test(inputValor)
    ) {
      reject("falta llenar " + id);
    }else   resolve(true);

  });
};

const comparacionPassword = (pass1, pass2) => {
  return new Promise((resolve, reject) => {
    const password1 = document.getElementById(pass1).value;
    const password2 = document.getElementById(pass2).value;
    if (password1 == password2) {
      resolve(true);
    } else {
      reject("las contraseñas no son iguales");
    }
  });
};

const btn = document.getElementById("btn");

btn.addEventListener("click", () => {

  getData("nombre")
    .then((valor) => {
      console.log(valor);

      if (valor==true) {
        return getData("apellidos");
      }
    })
    .then((valor) => {

      console.log(valor);
      if (valor) {
        return getData("email");
      }
    })
    .then((valor) => {

      console.log(valor);

      if (valor) {
        return getData("usuario");
      }
    })
    .then((valor) => {
      console.log(valor);

      if (valor) {
        return getData("password");
      }
    })
    .then((valor) => {
      if (valor) {
        return getData("repitePassword");
      }
    })
    .then((valor) => {
      if (valor) {
        return comparacionPassword("password", "repitePassword");
      }
    })

    .then((valor) => {
      console.log(valor + "llego al final ");
      document.frmRegistro.submit();
    })
    .catch((error) => {
      alert(error);
    });
});
