<?php
require_once "../../clases/conexion.php";
require_once "../../clases/Articulos.php";

/* ¡	 las dos lineas de abajo es para poder capturar los datos del json de fetch 	! */
$jsonData=file_get_contents('php://input');
$data=json_decode($jsonData, true);

$idart=$data['valor'];

$obj=new articulos();

echo json_encode($obj->obtenDatosArticulo($idart));

?>