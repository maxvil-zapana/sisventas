const agregar = document.getElementById('btnAgregarCategoria');
        agregar.addEventListener('click', async (e) => {

            const datos = serialize(frmCategorias)
            const vacios = validarFormVacio(datos)

            if (vacios > 0) {
                alertify.alert("Debes de llenar los campos");
                return false;
            } else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/categorias/agregaCategoria.php',
                    info: "ind="+index
                }

                const respuesta = await ajax(objeto)
                console.log(respuesta.response);

                if (respuesta.response == 1) {
                    
                    alertify.alert("categoria agregada correctamente")
                } else {
                    alertify.alert("no se pudo agregar categoria")
                }
            }

            console.log(datos);
            console.log(vacios);
        })