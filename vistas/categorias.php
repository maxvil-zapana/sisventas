<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // echo $_SESSION['usuario'];
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Categorias</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-2">
                <form action="" id="frmCategorias" name="frmCategorias">
                    <fieldset>
                        <legend class="leyenda">CATEGORIA</legend>
                        <label for="categoria">Categoria</label></br>
                        <input id="inputCategoria" type="text" class="icon-description" name="categoria" id="categoria">
                        </br>
                        <div class="botones">
                            <span class="boton verde" id="btnAgregarCategoria">Agregar</span>
                        </div>
                    </fieldset>
                </form>
                <div style="border:1px solid green" id="tablaCategoriaLoad">

                </div>
            </div>
        </div>


        <!-- ======================
              *	VENTANA	MODAL   *
            ====================== -->
        <div id="actualizaCategoria" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <span class="close" id="close">&times;</span>
                    <h4 class="title">Actualiza Categoria</h4>
                </div>
                <div class="modal-body">

                    <form action="" name="frmActualizaCategoria" onsubmit="return false">
                        <input type="hidden" class="" name="idCategoria" id="idCategoria">
                        <label for"editaCategoria">Categoria</label>
                        <input type="text" class="" name="editaCategoria" id="editaCategoria">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="boton" id="btnActualizaCategoria">Guardar</button>
                </div>
            </div>
        </div>

    </body>

    </html>
    <!-- ======================
         *	AGREGAR CARTEGORIA	*
        ====================== -->
    <script type="text/javascript">

        const tablaCategoriaLoad = document.getElementById("tablaCategoriaLoad")
        load(tablaCategoriaLoad, 'categorias/tablaCategorias.php');

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
                    info: datos
                }

                const respuesta = await ajax(objeto)
                console.log(respuesta.response);

                if (respuesta.response == 1) {
                    load(tablaCategoriaLoad, 'categorias/tablaCategorias.php');
                    alertify.alert("categoria agregada correctamente")
                } else {
                    alertify.alert("no se pudo agregar categoria")
                }

                inputCategoria.value = "";
                load(tablaCategoriaLoad, 'categorias/tablaCategorias.php');

            }

            console.log(datos);
            console.log(vacios);
        })
    </script>

    <!-- ============================
          *	VENTANA EDITAR CATEGORIA	*
         ============================== -->
    <script type="text/javascript">
        /*===	oculta ventana modal	===*/

        window.onload = function () {
            actualizaCategoria.style.display = "none";
        }
        /*===	muestra ventana para editar categoria	===*/
        function agregaDato(idCategoria, categoria) {

            document.getElementById('idCategoria').value = idCategoria;
            document.getElementById('editaCategoria').value = categoria;

            actualizaCategoria.style.display = "block"
        }
        /*=== cierra ventana modal X	===*/
        const close = document.getElementById('close');
        close.onclick = function () {
            actualizaCategoria.style.display = "none";
        }

        /*===	ACTUALIZA CATEGORIA	===*/
        boton = document.getElementById("btnActualizaCategoria");


        boton.addEventListener('click', async (e) => {


            e.preventDefault()//por ser un boton se tiene que prevenir su evento
            //previene el click y el enter

            // se coloca el name del formulario
            const datos = serialize(frmActualizaCategoria);
            console.log(datos);

            //validamos si esta sin valor el formulario
            const vacios = validarFormVacio(datos)

            if (vacios > 0) {
                alertify.alert("Debes de llenar los campos");
                return false;
            } else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/categorias/actualizaCategoria.php',
                    info: datos
                }

                const respuesta = await ajax(objeto)
                console.log(respuesta.response);

                load(tablaCategoriaLoad, 'categorias/tablaCategorias.php');
                actualizaCategoria.style.display = "none";

                if (respuesta.response == 1) {
                    alertify.alert("Categoria agregada correctamente")
                } else {
                    alertify.alert("no se pudo agregar Categoria")
                }
            }            //creando un objeto

        })
    </script>

    <!-- ======================
       *	ELIMINAR CATEGORIA	*
       ====================== -->

    <script type="text/javascript">
       function eliminarCategoria(idCategoria) {
            const datos="idcategoria="+idCategoria;

            alertify.confirm('¿Desea eliminar esta categoria?', async function () {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/categorias/eliminaCategoria.php',
                    info: datos
                }
                const resultado = await ajax(objeto)
                console.log(resultado.response);

                if (resultado.responseText == "    1") {
                    load(tablaCategoriaLoad, 'categorias/tablaCategorias.php');
                    alertify.alert("Eliminado con exito!!")
                } else {
                    alertify.error("No se pudo Eliminar categoria")
                }
            }, function () {
                alertify.error('Cancelo !')
            });

        }

    </script>

    <?php
} else {
    header("location:../index.php");
}
?>