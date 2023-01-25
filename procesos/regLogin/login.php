<?php

session_start();

require_once "../../clases/conexion.php";
require_once "../../clases/usuarios.php";


$datos = array(
    $_POST['usuario'],
    $_POST['password']
);
$obj = new usuarios();

echo $obj->loginUser($datos);

?>