<?php
/*===	PARA QUE EL REGISTRO DE USUARIO APAREZCA CUANDO NO HAY ADMIN REGISTRADO	===*/
require_once "clases/conexion.php";

$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * FROM usuarios where email='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
    $validar = 1;
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Login de Usuario ::.</title>
    <script src="js/funciones.js"></script>
    <link rel="stylesheet" href="css/Framework.css">
    <link rel="stylesheet" href="css/formularios.css">


    <style>
        form {
            width: 30%;
        }

        img {
            width: 50%;
            height: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="flexContainer">
            <form action="" id="frmLogin" name="frmLogin">
                <fieldset>
                <legend class="tituloForm">LOGIN</legend>
                <div class="logo">
                    <img src="img/logo.png" alt="fotografia">
                </div>
                <label for="nombre">Usuario</label>
                <input type="text" class="icon-user" name="usuario">
                <label for="nombre">Password</label>
                <input type="password" class="icon-password" name="password">
                <div class="botones">
                    <button class="boton" id="entrar">Entrar</button>
                    <?php if(!$validar):?>
                    <a href="registro.php" class="boton verde" id="registro">Registro</a>
                    <?php endif?>
                </div>
                </fieldset>
            </form>
        </div>

    </div>
    <div id="prueba"></div>
</body>

</html>

<script type="text/javascript">
    boton = document.getElementById("entrar")
    boton.addEventListener('click', async (e) => {
        e.preventDefault()//por ser un boton se tiene que prevenir su evento

        // console.log(e)
        const datos = serialize(frmLogin);
        console.log(datos);
        //creando un objeto
        const objeto = {
            method: 'POST',
            url: 'procesos/reglogin/login.php',
            info: datos
        }
        const respuesta = await ajax(objeto)

        console.log(respuesta.response)

        if (respuesta.response == 1) {
            window.location = "vistas/inicio.php"
        }
        else {
            alert("volver a enviar los credenciales")

        }
    })



</script>