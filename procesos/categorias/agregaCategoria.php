<?php
session_start();
require_once "../../clases/conexion.php";
require_once "../../clases/categorias.php";


$fecha=date("Y-m-d");
$id_usuario=$_SESSION['iduser'];
$categoria=$_POST['categoria'];

$datos=array(
    $id_usuario,
    $categoria,
    $fecha
);

$obj=new categorias();
echo $obj->agregarCategoria($datos);
?>