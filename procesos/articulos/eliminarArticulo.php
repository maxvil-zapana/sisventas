<?php


require_once"../../clases/conexion.php";
require_once"../../clases/Articulos.php";

$idart=$_POST['idarticulo'];
$obj=new articulos;

echo $obj->eliminaArticulo($idart);


?>