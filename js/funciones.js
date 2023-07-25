function validarFormVacio(datos) {
  // datos = serialize(formulario);
  d = datos.split("&");
  vacios = 0;
  for (i = 0; i < d.length; i++) {
    controles = d[i].split("=");
/* -	DETALLE:
  -	controles[1]=="A"
  -	se refiere a los input tipo select, para que detecte como valor vacio
  -	<option value="A">selecciona</option>	*/

    if (controles[1]=="A"||controles[1] == "") {
      vacios++;
    }
  }
  return vacios;
}

/* -	DETALLE:
  -	como parametro de la funcion se debe colocar el nombre del formulario*/

function serialize(form) {
  if (!form || form.nodeName !== "FORM") {
      return;
  }
  var i, j, q = [];
  for (i = form.elements.length - 1; i >= 0; i = i - 1) {
      if (form.elements[i].name === "") {
          continue;
      }
      switch (form.elements[i].nodeName) {
      case 'INPUT':
          switch (form.elements[i].type) {
          case 'text':
          case 'hidden':
          case 'password':
          case 'button':
          case 'reset':
          case 'submit':
          case 'color':
          case 'date':
          case 'datetime-local':
          case 'email':
          case 'month':
          case 'number':
          case 'range':
          case 'search':
          case 'tel':
          case 'time':
          case 'url':
          case 'week':
          

              q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
              //console.log(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
              break;
          case 'checkbox':
          case 'radio':
              if (form.elements[i].checked) {
                  q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
              }
              break;
          // case 'file':
          //       break;
          }
          break;
      case 'file':

      case 'TEXTAREA':
          q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
          break;
      case 'SELECT':
          switch (form.elements[i].type) {
          case 'select-one':
              q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
              break;
          case 'select-multiple':
              for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                  if (form.elements[i].options[j].selected) {
                      q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                  }
              }
              break;
          }
          break;
      case 'BUTTON':
          switch (form.elements[i].type) {
          case 'reset':
          case 'submit':
          case 'button':
              q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
              break;
          }
          break;
      }
  }
  return q.join("&");
}


const ajax=peticion=>{
  return new Promise((resolve,reject)=>{
    
    const xhr=new XMLHttpRequest()
    
    xhr.open(peticion.method, peticion.url,true)
    xhr.addEventListener('load', e=>{
      resolve(e.target)
      console.log(e.target);
    })
    if(peticion.info){
        //cabecera para que se pueda enviar datos por el metodo send()
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      xhr.send(peticion.info);
      
      console.log(peticion.info);
    }
    else{
      xhr.send()
    }


  })
}

const load=(elemento,url)=>{
req=new XMLHttpRequest();
req.open("GET",url,false)
req.send(null);



elemento.innerHTML=req.responseText;
}
