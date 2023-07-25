<?php
session_start();
if (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'admin') {
    // echo $_SESSION['usuario'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Usuarios</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-6">
                <div class="span-2">
                    <form id="frmRegistro" onsubmit="return false" name="frmRegistro"
                        action="../procesos/regLogin/registrarUsuario.php" method="post">
                        <fieldset>
                            <legend class="tituloForm">Administrar usuarios</legend>
                            <label for="Nombre">Nombre</label>
                            <input class="icon-user" type="text" id="nombre" name="nombre">

                            <label for="Apellidos">Apellidos</label>
                            <input class="icon-user" type="text" id="apellidos" name="apellidos">

                            <label for="email">e-mail</label>
                            <input class="icon-mail" type="mail" id="email" name="email">

                            <label for="Usuario">usuario</label>
                            <input class="icon-user" type="text" id="usuario" name="usuario">

                            <label for="password">Password</label>
                            <input class="icon-password" type="password" id="password" name="password">

                            <label for="password">Repite Password</label>
                            <input class="icon-password" id="repitePassword" type="password">

                            <div class="botones">
                                <button class="boton" id="btn">Registrar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="span-4" id="tablaUsuariosLoad">

                </div>

            </div>
        </div>
        <!-- ======================
              *	VENTANA	MODAL   *
            ====================== -->
        <div id="abremodalUpdateUsuario" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <span class="close" id="close">&times;</span>

                </div>
                <div class="modal-body">

                    <form id="frmActualizaU" onsubmit="return false" name="frmActualizaU"
                        action="../procesos/regLogin/registrarUsuario.php" method="post">
                        <fieldset>
                            <legend class="tituloForm">Actualiza Usuario</legend>
                            <input type="hidden" id="idUsuario" name="idUsuario">
                            <label for="NombreU">Nombre</label>
                            <input class="icon-user" type="text" id="nombreU" name="nombreU">

                            <label for="ApellidosU">Apellidos</label>
                            <input class="icon-user" type="text" id="apellidosU" name="apellidosU">

                            <label for="emailU">e-mail</label>
                            <input class="icon-mail" type="mail" id="emailU" name="emailU">

                            <label for="UsuarioU">usuario</label>
                            <input class="icon-user" type="text" id="usuarioU" name="usuarioU">


                            <div class="botones">
                                <button class="boton" id="btnActualizaU">Actualiza Usuario</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

        <script src="../js/validacionRegistro.js"></script>
    </body>

    </html>


    <!-- ======================
       *	VENTANA EDITAR MODAL	*
       ====================== -->
    <script type="text/javascript">
        window.onload = function () {
            abremodalUpdateUsuario.style.display = "none";
            const tablaUsuariosLoad = document.getElementById("tablaUsuariosLoad")
            load(tablaUsuariosLoad, 'usuarios/tablaUsuarios.php')
        }
    </script>
    <script type="text/javascript">
        function agregaDatosUsuario(idusuario) {
            abremodalUpdateUsuario.style.display = "block";
            fetch('../procesos/usuarios/obtenDatoUsuario.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ valor: idusuario })
            })
                .then(response => response.json())
                .then(data => {

                    document.getElementById('idUsuario').value = data['idusuario'];
                    document.getElementById('nombreU').value = data['nombre'];
                    document.getElementById('apellidosU').value = data['apellido'];
                    document.getElementById('emailU').value = data['email'];

                })
        }
    </script>
    <script type="text/javascript">
        const btnActualizaU = document.getElementById("btnActualizaU");
        btnActualizaU.onclick = async function () {
            const datos = serialize(frmActualizaU);
            const vacios = validarFormVacio(datos);
            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos");
                return false;
            } else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/usuarios/actualizaUsuario.php',
                    info: datos
                }
                const respuesta = await ajax(objeto)
                console.log(respuesta.response);

                if (respuesta.response == 1) {
                    load(tablaUsuariosLoad, 'usuarios/tablaUsuarios.php');
                    abremodalUpdateUsuario.style.display = "none";
                    alertify.alert("Usuario Agregado con exito");
                }
                else {
                    alertify.error("No se pudo actualizarUsuario")
                }
            }

        }

        /*===	Cierra ventana Modal	===*/
        const close = document.getElementById('close');
        close.onclick = function () {
            abremodalUpdateUsuario.style.display = "none";
        }
    </script>
    <!-- ======================
   *	ELIMINAR Usuario	*
   ====================== -->

    <script type="text/javascript">

        function eliminaUsuario(idUsuario) {
            const datos = "idusuario=" + idUsuario;

            alertify.confirm('¿Desea eliminar este usaurio?', async function () {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/usuarios/eliminaUsuario.php',
                    info: datos
                }
                const resultado = await ajax(objeto)
                console.log(resultado.response);

                if(resultado.responseText=="    1"){
                    load(tablaUsuariosLoad,'usuarios/tablaUsuarios.php');
                    alertify.alert("eliminado con exito!!")
                }else{
                    alertify.error("No se pudo eliminar Usuario")
                }
            },function(){
                alertify.error('Cancelo!')
            });

        }

    </script>


    <?php
} else {
    header("location:../index.php");
}
?>