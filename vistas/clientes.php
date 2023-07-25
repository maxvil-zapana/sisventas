<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // echo $_SESSION['usuario'];
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Clientes</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-6">
                <div class="span-2">

                    <form action="" name="frmCliente">
                        <fieldset>

                            <legend class="tituloForm">Clientes</legend>
                            <label for"nombre">Nombre</label>
                            <input type="text" class="icon-user" name="nombre" id="nombre">
                            <label for"apellidos">Apellidos:</label>
                            <input type="text" class="icon-user" name="apellidos" id="apellidos">
                            <label for"direccion">Dirección:</label>
                            <input type="text" class="icon-address" name="direccion" id="direccion">
                            <label for"email">Email:</label>
                            <input type="mail" class="icon-mail" name="email" id="email">
                            <label for"telefono">Telefono:</label>
                            <input type="tel" class="icon-cellphone" name="telefono" id="telefono">
                            <label for"rfc">RFC</label>
                            <input type="text" class="icon-user" name="rfc" id="rfc">

                            <div class="botones">
                                <span class="boton verde" id="btnAgregarCliente">Agregar</span>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="span-4" id="tabla">

                </div>
            </div>
        </div>



        <!-- ======================
              *	VENTANA	MODAL   *
            ====================== -->
        <div id="abremodalUpdateCliente" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <span class="close" id="close">&times;</span>
                    <h4 class="title">Actualiza Cliente</h4>
                </div>
                <div class="modal-body">

                    <form action="" name="frmClienteU" id="frmClienteU">
                        <fieldset>
                            <legend class="tituloForm">Actualiza Clientes</legend>

                            <input type="hidden" id="idClienteU" name="idClienteU">

                            <label for="nombreU">Nombre</label>
                            <input type="text" class="icon-user" name="nombreU" id="nombreU">

                            <label for="apellidosU">Apellidos:</label>
                            <input type="text" class="icon-user" name="apellidosU" id="apellidosU">

                            <label for="direccionU">Dirección:</label>
                            <input type="text" class="icon-address" name="direccionU" id="direccionU">

                            <label for="emailU">Email:</label>
                            <input type="mail" class="icon-mail" name="emailU" id="emailU">

                            <label for="telefonoU">Telefono:</label>
                            <input type="tel" class="icon-cellphone" name="telefonoU" id="telefonoU">

                            <label forJ="rfcU">RFC</label>
                            <input type="text" class="icon-user" name="rfcU" id="rfcU">
                        </fieldset>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="boton" id="btnActualizaCliente">Actualizar</button>
                </div>
            </div>
        </div>


    </body>

    </html>

    <!-- ============================
       *	VENTANA EDITAR MODAL	*
       ========================== -->

<!--===	OCULTA MODAL Y CARGA tablaclientes	===-->
<script type="text/javascript">
    window.onload=function(){
        abremodalUpdateCliente.style.display="none";
        load(tabla, 'clientes/tablaclientes.php');
    }

</script>
<!--===	MUESTRA DATOS EN MODAL	===-->
    <script type="text/javascript">
        function agregaDatosCliente(idcliente) {
            abremodalUpdateCliente.style.display = "block";
            fetch('../procesos/clientes/obtenDatoCliente.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ valor: idcliente })
            })
                .then(response => response.json())
                .then(data => {

                    document.getElementById('idClienteU').value = data['id_cliente'];
                    document.getElementById('nombreU').value = data['nombre'];
                    document.getElementById('apellidosU').value = data['apellido'];
                    document.getElementById('direccionU').value = data['direccion'];
                    document.getElementById('emailU').value = data['email'];
                    document.getElementById('telefonoU').value = data['telefono'];
                    document.getElementById('rfcU').value = data['rfc'];

                })
        }
/*===	CIERRA VENTANA MODAL	===*/
        const close = document.getElementById('close');
        close.onclick = function () {
            abremodalUpdateCliente.style.display = "none";
        }

    </script>
<!--===	ACTUALIZA CLIENTE	===-->
    <script type="text/javascript">
        const actualizaCliente = document.getElementById('btnActualizaCliente');
        actualizaCliente.onclick = async function () {
            const datos = serialize(frmClienteU);
            const vacios = validarFormVacio(datos);
            if (vacios > 0) {
                alertify.alert("debes llenar todos los campos");
                return false;
            }
            else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/clientes/actualizaCliente.php',
                    info: datos
                }
                const respuesta = await ajax(objeto)
                console.log(respuesta.response);
                if (respuesta.response == 1) {
                    load(tabla, 'clientes/tablaclientes.php');
                    abremodalUpdateCliente.style.display = "none";
                    alertify.alert("Cliente actualizado con éxito");
                } else {
                    alertify.error("No se pudo actualizar Cliente");
                }
            }
        }

    </script>


<!-- ======================
   *	CLIENTE NUEVO	*
   ====================== -->

    <script type="text/javascript">
        const agregar = document.getElementById('btnAgregarCliente');

        const tabla = document.getElementById('tabla')

    
        agregar.addEventListener('click', async (e) => {

            const datos = serialize(frmCliente)
            const vacios = validarFormVacio(datos)

            if (vacios > 0) {
                alertify.alert("Debes de llenar los campos");
                return false;
            } else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/clientes/agregarCliente.php',
                    info: datos
                }

                const respuesta = await ajax(objeto)
                console.log(respuesta.response);

                if (respuesta.response == 1) {
                    frmCliente.reset();
                    load(tabla, 'clientes/tablaclientes.php');
                    alertify.alert("Cliente agregado  correctamente")
                } else {
                    alertify.alert("no se pudo agregar cliente")
                }
            }

            console.log(datos);
            console.log(vacios);
        })
    </script>

<!--===	ELIMINA CLIENTE	===-->
<script type="text/javascript">
    function eliminarCliente(idcliente){
        const datos = "idcliente="+idcliente;

        alertify.confirm('¿Desea eliminar este usuario', async function(){
            const objeto = {
                method:'POST',
                url:'../procesos/clientes/eliminaCliente.php',
                info:datos
            }
            const resultado =await ajax(objeto)
            console.log(resultado.response);
            if(resultado.responseText=="    1"){
                load(tabla, 'clientes/tablaclientes.php');
                alertify.alert("Cliente eliminado con éxito");
            }else{
                alertify.error("no se pudo eliminar Cliente")
            }
        })
    }

</script>


    <?php
} else {
    header("location:../index.php");
}
?>