<?php
//print_r($_POST);//para ver que datos se esta enviando 
require_once "../../clases/conexion.php";
require_once "../../clases/usuarios.php";

$obj=new usuarios;


$datos = array(
    $_POST['idUsuario'],
    $_POST['nombreU'],
    $_POST['apellidosU'],
    $_POST['usuarioU'],
    $_POST['emailU']
);
echo $obj->actualizaUsuario($datos);



?>