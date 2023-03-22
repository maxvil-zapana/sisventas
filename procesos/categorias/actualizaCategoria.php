<?php
require_once "../../clases/Conexion.php";
require_once "../../clases/categorias.php";



$datos=array(
$_POST['idCategoria'],
$_POST['editaCategoria']);

$obj = new categorias();
echo $obj->actualizaCategoria($datos);

?>