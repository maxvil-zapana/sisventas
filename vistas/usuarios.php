<?php
session_start();
if (isset($_SESSION['usuario'])) {
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
                    <form id="frmRegistro" onsubmit="return false" name="frmRegistro" action="../procesos/regLogin/registrarUsuario.php" method="post">
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

                <div class="span-4">
                    <table>
                        <caption class="title-table">Usuarios</caption>
                        <thead class="head-table">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
        <script src="../js/validacionRegistro.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:../index.php");
}
?>