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
                        <input type="mail"class="icon-mail" name="email"id="email">
                        <label for"telefono">Telefono:</label>
                        <input type="tel"class="icon-cellphone" name="telefono"id="telefono">
                        <label for"rfc">RFC</label>
                        <input type="text"class="icon-user" name="rfc"id="rfc">

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
    </body>

    </html>
    <script type="text/javascript">
        const agregar=document.getElementById('btnAgregarCliente');
        
        const tabla=document.getElementById('tabla')

        load(tabla,'clientes/tablaclientes.php');



        agregar.addEventListener('click', async(e)=>{



        const datos=serialize(frmCliente)
        const vacios=validarFormVacio(datos)

        if (vacios>0) {
            alertify.alert("Debes de llenar los campos");
            return false;
        }else{
            const objeto={
                method:'POST',
                url:'../procesos/clientes/agregarCliente.php',
                info:datos
            }

            const respuesta =await ajax(objeto)
            console.log(respuesta.response);

            if (respuesta.response==1) {
                alertify.alert("Cliente agregada correctamente")
            }else{
                alertify.alert("no se pudo agregar cliente")
            }
        }

        console.log(datos);
            console.log(vacios);
        })
    </script>

<?php
} else {
    header("location:../index.php");
}
?>