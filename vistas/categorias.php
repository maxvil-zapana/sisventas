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
                        <input type="text" class="icon-description" name="categoria" id="categoria">

                        </br>
                        <div class="botones">
                        <span class="boton verde" id="btnAgregarCategoria">Agregar</span>
                        </div>
                    </fieldset>
                </form>
                <div style="border:1px solid green">
                    <table>
                        <caption class="title-table">Categorias</caption>
                        <thead class="head-table">
                            <tr>
                                <th>Categoria</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>esto es una prueba</td>
                                <td class="cell-center">
                                    <span class="btn-warnig"><span class="icon-pencil"></span>
                                    </span>
                                </td>
                                <td class="cell-center">
                                    <span class="icon-remove"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>

    <script type="text/javascript">
        const agregar=document.getElementById('btnAgregarCategoria');
        
        
        agregar.addEventListener('click', async(e)=>{

        const datos=serialize(frmCategorias)
        const vacios=validarFormVacio(datos)

        if (vacios>0) {
            alertify.alert("Debes de llenar los campos");
            return false;
        }else{
            const objeto={
                method:'POST',
                url:'../procesos/categorias/agregaCategoria.php',
                info:datos
            }

            const respuesta =await ajax(objeto)
            console.log(respuesta.response);

            if (respuesta.response==1) {
                alertify.alert("categoria agregada correctamente")
            }else{
                alertify.alert("no se pudo agregar categoria")
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