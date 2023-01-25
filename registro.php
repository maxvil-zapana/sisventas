<?php
/*===	PARA QUE EL REGISTRO DE USUARIO APAREZCA CUANDO NO HAY ADMIN REGISTRADO	===*/
require_once "clases/conexion.php";

$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * FROM usuarios where email='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
    header("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Registrate ::.</title>
    <link rel="stylesheet" href="css/Framework.css">
    <!-- <script src="librerias/jquery/jquery.js"></script> -->
        
    <style>
        form{
            width: 30%;
        }
        </style>
</head>
<body>

    <div class="contenedor">
        <div class="flexContainer">
            <form id="frmRegistro" onsubmit ="return false" name="frmRegistro" action="procesos/regLogin/registrarUsuario.php" method="post">
                <h1 class="tituloForm">REGISTRO</h1>

                <label for="Nombre">Nombre</label>
                <input class="input" type="text" id="nombre" name="nombre">

                <label for="Apellidos">Apellidos</label>
                <input class="input" type="text" id="apellidos" name="apellidos">

                <label for="email">e-mail</label>
                <input class="input" type="mail" id="email"name="email">

                <label for="Usuario">usuario</label>
                <input class="input" type="text" id="usuario" name="usuario">

                <label for="password" >Password</label>
                <input class="input" type="password" id="password"name="password">

                <label for="password" >Repite Password</label>
                <input class="input"id="repitePassword" type="password"> 

                <div class="botones">
                    <button class="boton" id="btn">Registrar</button>
                    <a href="index.php"class="boton verde">Regresar..</a>
                </div>
            </form>
            <script src="js/validacionRegistro.js"></script>
        </div>
    </div>


</body>

</html>
