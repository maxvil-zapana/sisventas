<?php
    require_once"../../clases/conexion.php";
    require_once"../../clases/usuarios.php";


    $idUsuario=$_POST['idusuario'];
    $obj=new usuarios;
    echo $obj->eliminaUsuario($idUsuario);
?>