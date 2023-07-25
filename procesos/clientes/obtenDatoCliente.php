<?php
require_once"../../clases/conexion.php";
require_once"../../clases/clientes.php";

$jsonData=file_get_contents('php://input');
$data=json_decode($jsonData,true);

// print_r($data['valor']);
$idcliente=($data['valor']);

$obj=new clientes;
echo json_encode($obj->obtenDatosCliente($idcliente));

?>