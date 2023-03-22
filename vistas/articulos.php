<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // echo $_SESSION['usuario'];
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Artículos</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-6">
                <div class="span-2">
                    <!-- -	DETALLE:
                                -	enctype="multipart/form-data"
                                -	sirve para que dentro del formulario se pueda subir archivos
                                -	para el input type file	-->

                    <form action="" id="frmArticulos" name="frmArticulos" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="tituloForm">Nuevo Artículo</legend>
                            <label for="categoria">Categoria:</label></br>
                            <select name="categoriaSelect" id="categoriaSelect" class="icon-select">
                                <option value="b">Selecciona Categoria</option>
                            </select>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="icon-user">

                            <label for="descripcion">Descripción:</label>
                            <input type="text" name="descripcion" id="descripcion" class="icon-amount">

                            <label for="cantidad">Cantidad:</label>
                            <input type="text" name="cantidad" id="cantidad" class="icon-description">
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" id="precio" class="icon-price">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="icon-picture">
                            </br>
                            <div class="botones">
                                <span class="boton verde btn_center" id="btnAgregarArticulo">Agregar</span>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="span-4">
                    <table>
                        <caption class="title-table">Articulos</caption>
                        <thead class="head-table">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                - <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
        $document
    </script>



    <?php
} else {
    header("location:../index.php");
}
?>